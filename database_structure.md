# Полная структура базы данных `u449664_laravel`

## Таблица `_users_`

| Поле (Field) | Тип (Type) | Null | Ключ (Key) | Дефолт (Default) | Extra |
| --- | --- | --- | --- | --- | --- |
| id | int(10) unsigned | NO |  | 0 |  |
| name | varchar(255) | NO |  |  |  |
| email | varchar(255) | YES |  |  |  |
| password | varchar(255) | NO |  |  |  |
| remember_token | varchar(100) | YES |  |  |  |
| created_at | timestamp | YES |  |  |  |
| updated_at | timestamp | YES |  |  |  |

---

## Таблица `ad_board`

| Поле (Field) | Тип (Type) | Null | Ключ (Key) | Дефолт (Default) | Extra |
| --- | --- | --- | --- | --- | --- |
| id | int(11) | NO | PRI |  | auto_increment |
| name | varchar(255) | NO |  |  |  |
| extras | text | NO |  |  |  |
| images | varchar(255) | NO |  |  |  |

---

## Таблица `aef`

| Поле (Field) | Тип (Type) | Null | Ключ (Key) | Дефолт (Default) | Extra |
| --- | --- | --- | --- | --- | --- |
| id | int(10) unsigned | NO | PRI |  |  |
| name | varchar(255) | NO |  |  |  |
| is_active | smallint(6) | NO |  |  |  |

---

## Таблица `applications`

| Поле (Field) | Тип (Type) | Null | Ключ (Key) | Дефолт (Default) | Extra |
| --- | --- | --- | --- | --- | --- |
| id | int(10) unsigned | NO |  |  |  |
| name | varchar(255) | NO |  |  |  |
| key | varchar(255) | NO |  |  |  |
| secret | varchar(255) | NO |  |  |  |
| is_active | tinyint(3) unsigned | NO |  | 1 |  |
| created_at | timestamp | YES |  |  |  |
| updated_at | timestamp | YES |  |  |  |

---

## Таблица `balance_accruals_payments`

| Поле (Field) | Тип (Type) | Null | Ключ (Key) | Дефолт (Default) | Extra |
| --- | --- | --- | --- | --- | --- |
| id | int(10) unsigned | NO | PRI |  |  |
| plot | varchar(6) | NO |  |  |  |
| accrued | decimal(15,2) | YES |  |  |  |
| paid | decimal(15,2) | YES |  |  |  |
| debt | decimal(15,2) | YES |  |  |  |
| overpayment | decimal(15,2) | YES |  |  |  |
| show | tinyint(1) | YES |  |  |  |
| created_at | timestamp | NO |  |  |  |
| updated_at | timestamp | NO |  |  |  |

---

## Таблица `billboard`

| Поле (Field) | Тип (Type) | Null | Ключ (Key) | Дефолт (Default) | Extra |
| --- | --- | --- | --- | --- | --- |
| id | int(11) | NO | PRI |  | auto_increment |
| name | varchar(100) | NO | UNI |  |  |
| amount | decimal(15,2) | NO |  |  |  |
| message | text | NO |  |  |  |
| date_from | date | NO |  |  |  |
| date_to | date | YES |  | 9999-12-31 |  |
| actual | tinyint(1) | YES |  | 1 |  |

---

## Таблица `billboard_image`

| Поле (Field) | Тип (Type) | Null | Ключ (Key) | Дефолт (Default) | Extra |
| --- | --- | --- | --- | --- | --- |
| id | int(11) | NO | PRI |  | auto_increment |
| billboard_id | int(11) | NO | MUL |  |  |
| image_name | varchar(50) | NO |  |  |  |

---

## Таблица `clients`

| Поле (Field) | Тип (Type) | Null | Ключ (Key) | Дефолт (Default) | Extra |
| --- | --- | --- | --- | --- | --- |
| id | int(10) unsigned | NO | PRI |  | auto_increment |
| user_id | int(10) unsigned | NO |  |  |  |
| code_1c | varchar(12) | NO |  |  |  |
| last_name | varchar(255) | NO |  |  |  |
| first_name | varchar(255) | NO |  |  |  |
| middle_name | varchar(255) | NO |  |  |  |
| plot | varchar(6) | NO |  |  |  |
| plot_int | int(11) | NO |  |  |  |
| electro_counter | int(11) | NO |  |  |  |

---

## Таблица `dealings`

| Поле (Field) | Тип (Type) | Null | Ключ (Key) | Дефолт (Default) | Extra |
| --- | --- | --- | --- | --- | --- |
| id | int(10) unsigned | NO | PRI |  | auto_increment |
| client_id | int(10) unsigned | NO |  |  |  |
| aef_id | int(10) unsigned | NO |  |  |  |
| accruals | decimal(15,2) | NO |  |  |  |
| payments | decimal(15,2) | NO |  |  |  |
| start_date | date | NO |  |  |  |
| end_date | date | YES |  |  |  |

---

## Таблица `electro_counter_list`

| Поле (Field) | Тип (Type) | Null | Ключ (Key) | Дефолт (Default) | Extra |
| --- | --- | --- | --- | --- | --- |
| id | int(10) unsigned | NO | PRI |  |  |
| user_id | int(11) | NO |  |  |  |
| summ | float | YES |  | 0 |  |
| l | int(11) | YES |  |  |  |
| m | int(11) | YES |  |  |  |
| created_at | datetime | NO |  |  |  |

---

## Таблица `logs`

| Поле (Field) | Тип (Type) | Null | Ключ (Key) | Дефолт (Default) | Extra |
| --- | --- | --- | --- | --- | --- |
| id | int(11) | NO | PRI |  | auto_increment |
| user_id | int(11) | NO |  |  |  |
| session | varchar(50) | NO |  |  |  |
| visit_date | date | NO |  |  |  |

---

## Таблица `migrations`

| Поле (Field) | Тип (Type) | Null | Ключ (Key) | Дефолт (Default) | Extra |
| --- | --- | --- | --- | --- | --- |
| id | int(10) unsigned | NO |  |  |  |
| migration | varchar(255) | NO |  |  |  |
| batch | int(11) | NO |  |  |  |

---

## Таблица `password_resets`

| Поле (Field) | Тип (Type) | Null | Ключ (Key) | Дефолт (Default) | Extra |
| --- | --- | --- | --- | --- | --- |
| email | varchar(255) | NO |  |  |  |
| token | varchar(255) | NO |  |  |  |
| created_at | timestamp | YES |  |  |  |

---

## Таблица `turnover_balance_sheet`

| Поле (Field) | Тип (Type) | Null | Ключ (Key) | Дефолт (Default) | Extra |
| --- | --- | --- | --- | --- | --- |
| id | int(10) unsigned | NO | PRI |  | auto_increment |
| plot | varchar(6) | NO |  |  |  |
| expense_item | varchar(100) | NO |  |  |  |
| accrued | decimal(15,2) | YES |  |  |  |
| paid | decimal(15,2) | YES |  |  |  |
| debt | decimal(15,2) | YES |  |  |  |
| overpayment | decimal(15,2) | YES |  |  |  |
| show | tinyint(1) | YES |  | 1 |  |
| created_at | timestamp | YES |  |  |  |
| updated_at | timestamp | YES |  |  |  |

---

## Таблица `user_statistics`

| Поле (Field) | Тип (Type) | Null | Ключ (Key) | Дефолт (Default) | Extra |
| --- | --- | --- | --- | --- | --- |
| id | int(10) unsigned | NO | PRI |  | auto_increment |
| user_id | int(10) | NO |  |  |  |
| url | varchar(255) | NO |  |  |  |
| created_at | timestamp | YES |  |  |  |
| updated_at | timestamp | YES |  |  |  |

---

## Таблица `users`

| Поле (Field) | Тип (Type) | Null | Ключ (Key) | Дефолт (Default) | Extra |
| --- | --- | --- | --- | --- | --- |
| id | int(10) unsigned | NO | PRI |  | auto_increment |
| name | varchar(255) | NO |  |  |  |
| email | varchar(255) | YES |  |  |  |
| password | varchar(255) | NO |  |  |  |
| remember_token | varchar(100) | YES |  |  |  |
| created_at | timestamp | YES |  |  |  |
| updated_at | timestamp | YES |  |  |  |

---

## Таблица `users_`

| Поле (Field) | Тип (Type) | Null | Ключ (Key) | Дефолт (Default) | Extra |
| --- | --- | --- | --- | --- | --- |
| id | int(10) unsigned | NO |  |  |  |
| plot | varchar(10) | NO |  |  |  |
| name | varchar(255) | NO |  |  |  |
| phone | varchar(255) | YES |  |  |  |
| email | varchar(255) | YES |  |  |  |
| password | varchar(255) | NO |  |  |  |
| remember_token | varchar(100) | YES |  |  |  |
| created_at | timestamp | YES |  |  |  |
| updated_at | timestamp | YES |  |  |  |

---

## Таблица `users__`

| Поле (Field) | Тип (Type) | Null | Ключ (Key) | Дефолт (Default) | Extra |
| --- | --- | --- | --- | --- | --- |
| id | int(10) unsigned | NO | PRI |  | auto_increment |
| plot | varchar(10) | NO |  |  |  |
| name | varchar(255) | NO |  |  |  |
| phone | varchar(255) | YES |  |  |  |
| email | varchar(255) | YES |  |  |  |
| password | varchar(255) | NO |  |  |  |
| remember_token | varchar(100) | YES |  |  |  |
| created_at | timestamp | YES |  |  |  |
| updated_at | timestamp | YES |  |  |  |

---

