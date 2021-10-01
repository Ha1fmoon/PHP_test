<?
    include 'header.php';
    include 'db.php';
?>
<div class="main">
    <!-- Кнопки выбора функции -->
    <div class="buttons">
        <button class="faces-button">Добавить родителя</button>
        <button class="kids-button">Добавить ребёнка</button>
        <button class="table-button">Посмотреть таблицу</button>
    </div>

    <!-- Форма добавления физ.лиц -->

    <div class="faces-form hide">
        <form action="handler.php" method="post">
            <div class="form-field">
                <label> <p>Имя:</p>
                    <input name="name" type="text" required>
                </label>
            </div>

            <div class="form-field">
                <label> <p>Фамилия:</p>
                    <input name="soname" type="text" required>
                </label>
            </div>

            <div class="form-field">
                <label> <p>Отчество:</p>
                    <input name="fathers-name" type="text" required>
                </label>
            </div>

            <div class="form-field">
                <label> <p>Дата рождения:</p> 
                    <input name="birth-day" type="date" required>
                </label>
            </div>

            <div class="form-field">
                <p>Пол:</p> 
                <label> 
                    <p><input type="radio" name="gender" value="1" required>Мужской</p>
                </label>
                <label> 
                    <p><input type="radio" name="gender" id="2" required>Женский</p>
                </label>
                
            </div>

            <div class="form-field">
                <input type="hidden" name="submit" value="faces">
                <button type="submit"> Отправить </button>
            </div>
        </form>
    </div>

    <!-- Форма добавления детей -->

    <div class="kids-form hide">
        <form action="handler.php" method="post">
            <div class="form-field">
                <label> <p>Родитель:</p> 
                    <select name="parent" required>
                    <?
                    $parents = $data_base->query( "SELECT FullName, F_ID from faces" );
                    while ( $parent = $parents->fetch_assoc() ) {
                        $parent_id = $parent['F_ID'];
                        $parent_full_name = $parent['FullName'];
                        echo "<option value='$parent_id'>$parent_full_name</option>";
                    }
                    ?>
                    </select>
                </label>
            </div>

            <div class="form-field">
                <label> <p>Имя:</p>  
                    <input name="name" type="text" required>
                </label>
            </div>

            <div class="form-field">
                <label> <p>Фамилия:</p> 
                    <input name="soname" type="text" required>
                </label>
            </div>

            <div class="form-field">
                <label> <p>Отчество:</p> 
                    <input name="fathers-name" type="text" required>
                </label>
            </div>

            <div class="form-field">
                <label> <p>Дата рождения:</p> 
                    <input name="birth-day" type="date" required>
                </label>
            </div>

            <div class="form-field">
                <p>Пол:</p> 
                <label> 
                    <p><input type="radio" name="gender" value="1" required>Мужской</p> 
                </label>
                <label> 
                    <p><input type="radio" name="gender" value="2" required>Женский</p> 
                </label>
                
            </div>

            <div class="form-field">
                <input type="hidden" name="submit" value="kids">
                <button type="submit"> Отправить </button>
            </div>
        </form>
    </div>

    <!-- Вывод таблицы -->

    <div class="table-form hide">
        <form action="handler.php" method="post">

            <div class="filter">
                <label> 
                    <p><input type="radio" name="select" value="all" checked>Все</p> 
                </label>
                <label> 
                    <p><input type="radio" name="select" value="faces">Родители</p> 
                </label>  
                <label> 
                    <p><input type="radio" name="select" value="kids">Дети</p> 
                </label>
            </div>

            <div class="form-field">
                <input type="hidden" name="submit" value="table">
                <button type="submit"> Отправить </button>
            </div>

        </form>

        <div class="table-result"></div>
    </div>
</div>
<?
include 'footer.php';
?>