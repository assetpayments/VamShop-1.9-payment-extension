## VamShop 1.8 - 1.9 payment module

### Installation

* Backup your web store and database
* Upload the [upload] content to your website root directory via ftp
* Open Modules -> Payment modules
* Find AssetPayments (Visa/MasterCard) module
* Press blue circle with i symbol inside
* On the right side press Install button
* Press Edit button to configure the module settings:
  * Enable module - True
  * Allowed countries - leave empty
  * Merchant Id
  * Secret key
  * Template ID (default = 19)
  * Sort order - 0
  * Zone - Notes
  * Successful payment status - Paid successfully (add this status via Order -> Statuses)
  * Failed payment status - Payment failed (add this status via Order -> Statuses)
  * Press Add button
* Link this module with delivery method in Marketing -> Delivery-Payment
  * Press Add button
  * Select delivery method
  * Fill checkbox with AssetPayments payment method.
  
### Notes
Tested with VamShop 1.97

## Модуль оплаты VamShop 1.8 - 1.9

### Установка

* Создайте резервную копию вашего магазина и базы данных
* Скопируйте по фтп содержимое папки [upload] в корневую директорию сайта 
* Откройте меню Модули -> Модули оплаты 
* Найдите в списке модуль AssetPayments (Visa/MasterCard)
* Нажмите на синий кружок, после чего установите модуль с помощью кнопки Установить справа
* Нажмите кнопку Редактировать для настройки 
  * Разрешить модуль - True
  * Разрешенные страны - оставить пустым
  * Введите Id магазина
  * Введите Секретный ключ
  * Укажите Id шаблона (по-умолчанию = 19)
  * Порядок сортировки - 0
  * Зона (можно оставить нет)
  * Статус оплаченного заказа (добавить можно в меню Заказы -> Статусы заказа)
  * Статус ошибки оплаты (добавить можно в меню Заказы -> Статусы заказа)
  * Нажмите кнопку Добавить
* Укажите методы доставки, для которых будет разрешена оплата AssetPayments в меню Маркетинг -> Доставка-Оплата
  * Нажмите кнопку Добавить
  * Выберите способ доставки и поставьте птичку напротив метода AssetPayments
  * Нажмите кнопку Сохранить

### Примечания
Протестировано с VamShop 1.97
