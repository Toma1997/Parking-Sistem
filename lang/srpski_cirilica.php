﻿<?php

$jezici_mapa = array(
	'admin' => '<li class="nav-item"><a class="nav-link" href="?stranica=messages">Поруке</a>
				<li class="nav-item"><a class="nav-link" href="?stranica=addAdmin">Додај Админа</a>',
	'client' => '<li class="nav-item"><a class="nav-link" href="?stranica=contact">Контакт</a>	',
	'contact' =>  array('Контактирајте нас',
				'Можете нам послати е-маил и попунити следећи образац:',
				'Име и презиме:',
				'Емаил адреса:',
				'Наслов поруке:',
				'Молимо унесите поруку:',
				'Унесите код са слике',
				'Пошаљите',
				'<address><p>+381 11 3035 401, +381 11 3035 402</p>
				<p> <a href="mailto:parking@gmail.com ">parking@gmail.com </a>| parkingsistem.rs</p>
				<p>Београд, Србија</p></address>'),
	'copyright' => sprintf('&copy; Ауторска права: M&T %s | Услови коришћења ', date('Y')),
	'info' =>  array('Ниво:','Број слободних места:','Детаљнији приказ'),
	'login' => '<a class="text-light nav-link pt-0 pd-0" href="?stranica=register">Региструјте се</a>
				<a class="text-light nav-link pt-0 pd-0" href="?stranica=login">Пријавите се</a>',
	'loginPage' =>  array('Пријава корисника:', 'Адреса е-поште:', 'Унесите адресу е-поште', 'Лозинка:', 'Унесите лозинку','Пријавите се', '<h5>Лозинка није валидна !</h5>','<h5> Неисправно логованје !</h5>'),			
	'logo' => 'Паркинг Систем',
	'logout' => '<a class="text-light nav-link pt-0 pd-0" href="?stranica=logout">Одјавите се</a>',
	'menu' => '<li class="nav-item"><a class="nav-link" href="?stranica=">Насловна</a>
			   <li class="nav-item"><a class="nav-link" href="?stranica=parking&nivo=0">Паркинг</a>
			   <li class="nav-item"><a class="nav-link" href="?stranica=price">Ценовник</a>',
	'parking' => array('УЛАЗ','ИЗЛАЗ','ДОЛЕ','ГОРЕ','ОДОЗДО','ОДОЗГО'),
	'price' => array('<h1>Цене и Попусти</h1>',
				 '<div class="col bg-primary"><strong>Тип лица</strong></div>
				<div class="col bg-primary"><strong>Услуга</strong></div>
				<div class="col bg-primary"><strong>Цена по започетом сату</strong></div>',
				'Паркирање без резервације',
				'Паркирање са резервацијом'),
	'register' => array('Регистрација корисника', 'Тип лица:', 'Физичка особа', 'Правно лице', 'Унеси име',  'Унеси презиме','Унесите адресу е-поште', 
				'Број телефона мора имати образац: 063-111-888 (8)', 'Унесите телефонски број',
				'Лозинка мора имати најмање 8 карактера од тог једно мало слово, један велики, посебан карактер и број.',
				'Унесите лозинку', 'Поново унесите лозинку', 'Унеси код са слике', 'Региструј се'),
	'reserve' =>  array('<h1>Резервације </h1>', 'Регистарски број воѕила:', 'Спрат:', 'Сектор:', 'Место:', 'Датум и време боравка:','Резервација','Пример'),
	'text' => array('<h1> Гараже и паркиралишта </h1>
				<p> Систем за паркирање управља једним од највећих јавних гаража. Корисници имају око 400 паркинг места. </p>
				<h3> Паркинг у гаражама </h3>
				<p> <li> Плаћени по сату, дневно (једнократни дневни паркинг) </li>
				<li> Месечне претплате, у зависности од врсте услуге коју корисник (физичко или правно лице) одлучи. </li> </p>
				<h3> Паркинг на паркингу </h3>
				<p> Плаћа се по сату, дневно (једнократни дневни паркинг), али има и неколико месечних опција за претплату. </p>',
				'Предности паркирног система',
				'Једноставно паркирање',
				'Сигурност вашег возила',
				'Систем за паркирање у реалном времену',
				'Једноставан приступ паркингу'),
	'type' =>  array('Физичко','Правно'),			

);

$jezici_error = array(
	'registration' => '<h5>Регистрација је тачна!</h5>',
	'floor' 	   => '<h5>Није изабран одговарајући спрат!</h5>',
	'sector' 	   => '<h5>Није изабран одговарајући сектор!</h5>',
	'place'        => '<h5>Није изабрано одговарајуће место!</h5>',
	'date'         => '<h5>Датум и време нису у добром формату!</h5>',
	'reserved'     => '<h5>Место није слободно, погледајте мапу са слободним местима!</h5>',
	'success'      => '<h5>Успешно резервисано место!</h5>',
	'error'        => '<h5>Дошло је до грешке при регистрацији возила, покушајте поново!</h5>',
	'pass'  	   => '<h5>Лозинка није тачна!</h5>',
	'passCheck'    => '<h5>Лозинка није успешно потврђена!</h5>',
	'login'		   => '<h5>Неисправно логовање!</h5>',
	'email'		   => '<h5>Адреса е-поште није тачна!</h5>',
	'forename'	   => '<h5>Име није тачно!</h5>',
	'surname'	   => '<h5>Презиме није тачно!</h5>',
	'telephone'	   => '<h5>Телефон није тачан!</h5>',
	'captcha'	   => '<h5>Унос текста се не поклапа са сликом!</h5>',
	'form'		   => '<h3>Грешка валидације формулара!</h3>',
	'regCheck'	   => '<h3>Већ сте регистровани!</h3>',
	'link' 		   => '<div class="card-body"> <h4 class="card-title">Грешка 404! Немам такву страницу.</h4></div>',
);

?>