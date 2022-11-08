<?php 


$dbhost = "localhost";
$dbname = "tso";
$username = "root";
$password = "root";

$db = mysqli_connect('localhost', 'root', 'root', 'TSO');


function get_singles_all(){
    global $db;
    $singles = $db->query("SELECT * FROM cabinet");
    return $singles;
}

function get_single_by_id($id){
    global $db;
    $singles = $db->query("SELECT * FROM cabinet WHERE id = $id");
    foreach ($singles as $single){
        return $single;
    }
}



$single = get_single_by_id($_GET['id']);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/LogoFooter.svg">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>ТСО</title>
</head>
<body>


    <div class="wrapper">
            
        <header id="header" class="header">
                <div class="container">
                    <div class="header__inner">
                        <a href="index.html" class="logo"><img src="img/Logo.svg" alt="Logo"></a>
                        <nav class="menu"> 
                            <a href="index.html" class="menu__link">Главная</a>
                            <a href="audiences.html" class="menu__link active">Аудитории</a>
                            <a href="contact.html" class="menu__link">Контакты</a>
                        </nav>
                        <a class="button open-popup" href="#">Забронировать</a>
							<div class="popup__bg"> 
								<form action="vendor/booking.php" method='post' enctype="multipart/form-data" class="popup">
									<img src="img/close.svg" class="close-popup">
									<h2 class="popup__title">ЗАБРОНИРОВАТЬ</h2>
									<label>
										<input class="popup__input" type="text" name="name" placeholder="ФИО" required>
									</label>
									<label>
										<input class="popup__input" type="tel" name="tel" placeholder="Номер телефона" required>
									</label>
									<label>
										<input class="popup__input" type="text" name="audnum" placeholder="Номер аудитории" required>
									</label>
									<label>
										<input class="popup__input popup__date" type="date" id="date" name="date" required>
									</label>
									
									
									<button class="button"	type="submit">Отправить</button>
								</form>
							</div> 
                    </div>			
                </div>		
        </header>	
        <section id="audiences" class="audiences">
            <div class="container">
                <div class="audiences__inner audiences-indent"> 
                        <h2 class="audiences__title">
                            <?php echo $single["auditorium"];?>
                        </h2>
                    
                    <h3 class="audiences__subtitle">Информация о кабинете</h3>
                    <div class="audiences__inf">
                        <p class="audiences__item">Номер аудитории: <?php echo $single["auditorium"];?></p>
                        <p class="audiences__item">Инвертарный номер: <?php echo $single["Invert_number"];?></p>
                        <p class="audiences__item">Корпус: <?php echo $single["corpus"];?></p>
                        <p class="audiences__item">Количество посадочных мест: <?php echo $single["number_of_seats"];?></p>
                        <p class="audiences__item">Кабинет УВП: <?php echo $single["cabinet_UVP"];?></p>
                        <p class="audiences__item">Телефон: <?php echo $single["Number"];?></p>
                        <p class="audiences__item">Тип комплекта: <?php echo $single["type_of_kit"];?></p>
                        <p class="audiences__item">Примечание: <?php echo $single["remark"];?></p>
                        <p class="audiences__item">Серийный номер монитора: <?php echo $single["monitor_serial_number"];?></p>
                        <p class="audiences__item">MAC-адрес компьютера: <?php echo $single["MAC_address"];?></p>
                    </div>

                    <h3 class="audiences__subtitle" style="margin-top:60px">Фотографии</h3>

                    <img src="<?php echo $single["image1"];?>" alt="" class="cabinet__img">
                    <img src="<?php echo $single["image2"];?>" alt="" class="cabinet__img">
                    <img src="<?php echo $single["image3"];?>" alt="" class="cabinet__img">

                    <a href="index.html" style="display:block">
                        <button style="margin-top:50px" class="button">Вернуться на главную</button>
                    </a>
                    
                    
                    
                </div> 	
                
            </div>
    </section>



        <footer id="footer" class="footer">
            <div class="container">
                <div class="footer__inner">
                    <a href="index.html">
                        <img src="img/LogoFooter.svg" alt="logo" class="footer__logo">	
                    </a>
                    <div class="footer__links">		
                        <a href="#" class="footer__link">Политика конфиденциальности</a>
                        <a href="#" class="footer__link">Отдел ТСО УИ-ВЦ МГТУ им.Н.Э.Баумана</a>
                        <a href="https://bmstu.ru/" target="_blank" class="footer__link">МГТУ им.Н.Э.Баумана</a>
                    </div>	
                </div>	
            </div>		
        </footer>
    </div>


    <script src="main.js"></script>
</body>
</html>