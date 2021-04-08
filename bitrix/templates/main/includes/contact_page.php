<div class="contacts_page">
    <div class="info_col">
        <div class="ttitle">Регионы продаж</div>
        <?if(CModule::IncludeModule("iblock"))
		{?>
            <div class="info_content">
                <div class="tabs">
                    <?$ar_contacts=CIBlockElement::GetList(
						array("SORT"=>"ASC"),
						array("IBLOCK_ID"=>11,"ACTIVE"=>"Y"),
						false,
						false,
						array("ID","NAME","PROPERTY_PHONES","PROPERTY_EMAIL","PROPERTY_ADDRESS","PROPERTY_MAP","PROPERTY_PEOPLE")
					);
					$count=0;
					while($contact=$ar_contacts->GetNext())
					{
						$count++;?>
                        <div class="tab <?if($count==1){echo " active ";}?>" id="page_<?=$contact[" ID "]?>">
                            <div class="region_list">Воронеж, Воронежская область</div>
                            <div class="common_info">
                                <div class="phone">
                                    <div class="title">Контактные телефоны:</div>
                                    <?foreach($contact["PROPERTY_PHONES_VALUE"] as $phone)
									{?>
                                        <span class="number">
                                            <?=$phone?>
                                        </span>
                                        <?}?>
                                </div>
                                <?if(!empty($contact["PROPERTY_EMAIL_VALUE"]))
								{?>
                                    <div class="email">
                                        <span class="title">E-mail:</span>
                                        <a href="mailto:<?=$contact[" PROPERTY_EMAIL_VALUE "];?>">
                                            <?=$contact["PROPERTY_EMAIL_VALUE"];?>
                                        </a>
                                    </div>
                                    <?}?>
                                        <?if(!empty($contact["PROPERTY_ADDRESS_VALUE"]))
								{?>
                                            <div class="address">
                                                <span class="title">Адрес:</span>
                                                <?=$contact["PROPERTY_ADDRESS_VALUE"];?>
                                            </div>
                                            <?}?>
                                                <div class="clear"></div>
                                                <div>
                                                    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <b>Часы работы:</b> 8:00 - 17:00 (пн-пт), 8:30 - 16:30 (сб), воскресенье
                                                    - выходной
                                                    <div>
                                                        <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <b></b>&nbsp;&nbsp;
                                                    </div>
                                                    <div class="clear"></div>
                                                    <br />
                                                    <!--время работы -->
                                                </div>
                            </div>
                            <?if($contact["PROPERTY_PEOPLE_VALUE"])
							{?>
                                <table class="contacts_list" cellspacing="0" cellpadding="0">
                                    <thead>
                                        <tr>
                                            <td class="work">Должность</td>
                                            <td class="number">Доб. номер</td>
                                            <td class="name">ФИО</td>
                                            <td class="e-mail">E-mail</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?$ar_people=CIBlockElement::GetList(
											array("SORT"=>"ASC"),
											array("IBLOCK_ID"=>12,"ACTIVE"=>"Y","ID"=>$contact["PROPERTY_PEOPLE_VALUE"]),
											false,
											false,
											array("ID","NAME","PROPERTY_JOB","PROPERTY_ADD_NUMBER","PROPERTY_PHONE","PROPERTY_EMAIL")
										);
										while($people=$ar_people->GetNext())
										{?>
                                            <tr>
                                                <td class="work">
                                                    <?=$people["PROPERTY_JOB_VALUE"]?>
                                                </td>
                                                <td class="number">
                                                    <?=$people["PROPERTY_ADD_NUMBER_VALUE"]?>
                                                </td>
                                                <td class="name">
                                                    <?=$people["NAME"]?>
                                                </td>
                                                <td class="e-mail">
                                                    <?if($people["PROPERTY_EMAIL_VALUE"])
													{?>
                                                        <a href="mailto:<?=$people[" PROPERTY_EMAIL_VALUE "]?>">
                                                            <?=$people["PROPERTY_EMAIL_VALUE"]?>
                                                        </a>
                                                        <?}?>
                                                </td>
                                            </tr>
                                            <?}?>
                                    </tbody>
                                </table>
                                <?}?>
                                    <?$arTmp = explode(',', $contact['PROPERTY_MAP_VALUE']);
							$position['yandex_lat']= $arTmp[0];
							$position['yandex_lon']=$arTmp[1];
							$position['yandex_scale']="13";
							$position['PLACEMARKS'][] = array(
								"LON" => $arTmp[1],
								"LAT" => $arTmp[0],
								"TEXT" =>$contact["NAME"]
							);?>
                        </div>
                        <?}?>
                </div>
            </div>
            <?}?>
                <div class="region_list">
                    Белгород, Волгоград, Краснодар, Курск, Ростов-на-дону, Астрахань, Владикавказ, Махачкала, Нальчик, Черкесск, Чечня, Екатеринбург,
                    Казань, Ставрополь, Уфа, Челябинск, Элиста
                </div>
                <table class="contacts_list regs" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <td class="work">Должность</td>
                            <td class="mobile">Телефон</td>
                            <td class="name">ФИО</td>
                            <td class="e-mail">E-mail</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="work">Менеджер</td>
                            <td class="mobile">
                                +7-920-434-72-19
                                <br /> +7 (473) 200-89-81 доб. 238
                            </td>
                            <td class="name">Ковалёва Мария Николаевна</td>
                            <td class="e-mail">
                                <a href="mailto:kovaleva@vrn-ehk.ru">kovaleva@vrn-ehk.ru</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="region_list">
                    Санкт-Петербург, Москва, Калуга, Псков, Владимир, Саратов, Иваново, Кострома, Великий Новгород, Нижний Новгород, Ярославль,
                    Тверь, Алматы, Астана, Караганда, Павлодар, Усть-Каменогорск, города Крымского полуострова (Ялта, Симферополь,
                    Севастополь, Бахчисарай, Евпаторий, Керчь и пр.) Минск, Брест, Гомель, Борисов, Витебск, Гродно, Могилев,
                    Полоцк, Бобруйск, Несвиж, Каменец
                </div>
                <table class="contacts_list regs" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <td class="work">Должность</td>
                            <td class="mobile">Телефон</td>
                            <td class="name">ФИО</td>
                            <td class="e-mail">E-mail</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="work">Менеджер</td>
                            <td class="mobile">
                                +8-920-431-27-60
                                <br /> +7 (473) 200-89-81 доб. 239
                            </td>
                            <td class="name">Индоиту Павел Витальевич</td>
                            <td class="e-mail">
                                <a href="mailto:pavel@vrn-ehk.ru">pavel@vrn-ehk.ru</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="region_list">
                    Киров, Липецк, Омск, Пенза, Самара, Тюмень, Брянск, Оренбург, Рязань, Саранск, Тамбов, Тула, Ульяновск, Орел, Пермь, Ижевск,
                    Иркутск, Кемерово, Курган, Новосибирск, Урюпинск, Смоленск, Вологда
                </div>

                <table class="contacts_list regs" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <td class="work">Должность</td>
                            <td class="mobile">Телефон</td>
                            <td class="name">ФИО</td>
                            <td class="e-mail">E-mail</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="work">Менеджер</td>
                            <td class="mobile">
                                +7-903-656-03-05
                                <br /> +7 (473) 200-89-81 доб. 237
                            </td>
                            <td class="name">Алтухова Светлана Леонидовна</td>
                            <td class="e-mail">
                                <a href="mailto:altuhova@vrn-ehk.ru">altuhova@vrn-ehk.ru</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="map">
                                            <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=2y7kXX4oEbQBoW4kSyjVvoti8QGjKo3O&width=100%&height=365"></script>
                                            <?$APPLICATION->IncludeComponent(
								"bitrix:map.yandex.view",
								"",
								Array(
								)
							);?>
                                        </div>
    </div>

    <div class="feedback_col">
        <div class="title">Обратная связь</div>
        <form action="auto_load" class="callback_form" method="POST"></form>
    </div>
    <div class="clear"></div>
    <div class="selector_block">
        <div class="man">
            <div class="item i1 change_tab">
                <a href="/catalog/elementy-kovki/">
                    <span class="ico">
                        <img src="<?=SITE_TEMPLATE_PATH?>/images/man_i1_ico.png" width="100" height="100" alt="" />
                    </span>
                    <span class="text">Элементы ковки</span>
                </a>
            </div>
            <div class="item i2 change_tab">
                <a href="/catalog/gotovye-izdeliya/">
                    <span class="ico">
                        <img src="<?=SITE_TEMPLATE_PATH?>/images/man_i2_ico.png" width="100" height="100" alt="" />
                    </span>
                    <span class="text">Готовые изделия</span>
                </a>
            </div>
            <div class="item i3 change_tab">
                <a href="/gallery/">
                    <span class="ico">
                        <img src="<?=SITE_TEMPLATE_PATH?>/images/man_i3_ico.png" width="100" height="100" alt="" />
                    </span>
                    <span class="text">Фотогалерея</span>
                </a>
            </div>
            <div class="item i4 change_tab">
                <a href="/price/">
                    <span class="ico">
                        <img src="<?=SITE_TEMPLATE_PATH?>/images/man_i4_ico.png" width="100" height="100" alt="" />
                    </span>
                    <span class="text">Прайс-лист</span>
                </a>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
