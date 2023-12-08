# cafe 값 
# cafe(cafe_id, cafe_name, phone_number, operatingHours, city, ku, dong, zipcode)

INSERT INTO CAFE(cafe_id, cafe_name, phone_number, operatingHours, city, ku, dong, zipcode)
VALUES 
	(1, "1호점", "043-111-2222", "08:00 - 19:30", "청주시", "서원구", "사창동", "28644"),
    (2, "2호점", "043-222-3333", "10:00 - 16:00", "청주시", "서원구", "사창동", "28644");
    
# BARISTA 값 
# barista(b_id, b_name, working day, certification, #Cafe_id)

INSERT INTO BARISTA(b_id, b_name, working_day, certification, cafe_id)
VALUES 
	(2023001, "김수민", "월요일", "유", 1),
    (2023002, "김담비", "화요일", "무", 1),
    (2023003, "이도현", "수요일", "유", 1);
    
# menu 값 
#  Menu(Menu_id, price, menu_name, picture, #cafe_id)

INSERT INTO MENU(menu_id, price, menu_name, picture, b_id, cafe_id)
VALUE
	(8000, "4500원", "Americano", LOAD_FILE('C:\Users\hhh317\xamp\htdocs\company_internal_cafe_system\img\Americano'), 2023001, 1);

INSERT INTO MENU(menu_id, price, menu_name, picture, b_id, cafe_id)
VALUE
	(8001, "5000원", "Latte", LOAD_FILE('C:\Users\hhh317\xamp\htdocs\company_internal_cafe_system\img\Latte'), 2023002, 1);

INSERT INTO MENU(menu_id, price, menu_name, picture, b_id, cafe_id)
VALUES
	(8002, "5500원", "Caramel_macchiato", LOAD_FILE('C:\Users\hhh317\xamp\htdocs\company_internal_cafe_system\img\Caramel_macchiato'), 2023001, 1),
	(8003, "5500원", "Cappuccino", LOAD_FILE('C:\Users\hhh317\xamp\htdocs\company_internal_cafe_system\img\Cappuccino'), 2023002, 1);
