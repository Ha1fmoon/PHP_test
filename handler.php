<?

include "db.php";

if ( $_POST['submit'] == 'kids' || $_POST['submit'] == 'faces' ){

    $table = $_POST['submit'];
    $field_names = 'FullName, Soname, Name, FathersName, BirthDate, Gender';
    $values = '?,?,?,?,?,?';
    $types = 'sssssi';
    $params = [
        $_POST['soname'] . ' ' . $_POST['name'] . ' ' . $_POST['fathers-name'], 
        $_POST['soname'], 
        $_POST['name'], 
        $_POST['fathers-name'], 
        $_POST['birth-day'], 
        $_POST['gender']
    ];

    if ( isset( $_POST['parent'] ) ){
        $field_names = 'F_ID, ' . $field_names;
        $values .= ',?';
        $types = 'i' . $types;
        $parent = $_POST['parent'];
        array_unshift( $params, $parent );
    }

    $prepared = $data_base->prepare( "INSERT INTO $table ( $field_names ) VALUES ( $values )" );
    $prepared->bind_param( $types, ...$params );
    $result = $prepared->execute();
    if ( $result ){
        exit ( "Таблица $table успешно обновлена" );
    } else {
        exit ( "Таблица $table не обновлена" );
    }

} else {
    
    $faces_table = "SELECT 'faces' as 'Тип элемента', faces.Soname, faces.Name, faces.FathersName, faces.BirthDate, faces.Gender, NULL as 'F_ID (Примечание)' FROM faces";
    $kids_table = "SELECT 'kids' as 'Тип элемента', kids.Soname, kids.Name, kids.FathersName, kids.BirthDate, kids.Gender, faces.FullName FROM kids JOIN faces ON kids.F_ID=faces.F_ID";

    if ( $_POST['select'] == 'faces' ){
        $table = $faces_table;
    } else if ( $_POST['select'] == 'kids' ){
        $table = $kids_table;
    } else {
        $table = $faces_table . ' UNION ' . $kids_table;
    }

    $sql = "$table";
    $result = $data_base->query( $sql );
    $array = $result->fetch_assoc();
    $response = '';
    $response .= '<table border=2 cellspacing=0>';
    table_headers( $array, $response );
    while( $array ){
        table_data( $array, $response );
        $array = $result->fetch_assoc();
    }
    $response .= '</table>';
    exit ("$response");
}


function table_headers( $array, &$response ){
    $response .= "<tr>";
    foreach( $array as $key => $value ) {
        $response .= "<th> $key </th>";
    }
    $response .= "</tr>";
}

function table_data( $array, &$response ){
    $response .= "<tr>";
    foreach( $array as $key => $value) {
        if ( $key == 'F_ID (Примечание)' && isset( $value ) ){
            $words = explode( ' ', $value );
            $words[1] = substr( $words[1], 0, 2 );
            $words[2] = substr( $words[2], 0, 2 );
            $value = 'Родитель: ' . $words[0] . ' ' . $words[1] . '. ' . $words[2] . '.';
        }
        if ( $key == 'Gender' ){
            if ( $value == '1' ){
                $value = 'Мужской';
            } else {
                $value = 'Женский';
            }
        }
        $response .= "<td> $value </td>";
    }
    $response .= "</tr>";
}
