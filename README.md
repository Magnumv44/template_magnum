[![MIT License](https://img.shields.io/github/license/Magnumv44/template_magnum)](LICENSE "Ліцензійна угода")
[![Joomla 6](https://img.shields.io/badge/Joomla-6.x-brightgreen)](https://www.joomla.org)
[![Bootstrap 5](https://img.shields.io/badge/Bootstrap-5.3.8-blue)](https://getbootstrap.com)
[![Bootstrap Icons](https://img.shields.io/badge/Bootstrap_Icons-1.13.1-blue)](https://icons.getbootstrap.com)
[![jQuery 3](https://img.shields.io/badge/jQuery-3.7.1-0769AD)](https://jquery.org)
[![PrismJS](https://img.shields.io/badge/PrismJS-1.30.0-brightgreen)](https://github.com/PrismJS/prism)
[![Lightbox2](https://img.shields.io/badge/Lightbox2-2.11.4-brightgreen)](https://github.com/lokesh/lightbox2)

# Шаблон персонального блогу Magnum news

<p align="center">
<img src="https://github.com/Magnumv44/template_magnum/blob/development/magnum/media/images/template_preview.png?raw=true" title="Magnum news" alt="Magnum news">
</p>

Кастомний шаблон [персонального блогу](https://www.magnumblog.space "Натисніть щоб відкрити"), який базується на [**CMS Joomla 6**](https://www.joomla.org "Натисніть щоб відкрити").

Виконаний з використанням перевизначених стандартних компонентів та модулів Joomla.

---
### Загальні можливості
* Адаптивний дизайн
* Підтримка всіх сучасних браузерів

## Функціонал front-end

- Горизонтальне адаптивне меню
- Підсвічування синтаксису коду (PrismJS)
- Lightbox для зображень
- Кнопка прокрутки вгору
- Модуль пошуку *(ліва позиція)*
- Модуль оголошення *(ліва позиція)*
- Модуль контактів *(ліва позиція)*
- Модуль контекстної реклами *(ліва позиція)*

## Функції адміністрування

- Вибір логотипу та фону сайту (повсякденний / новорічний) через радіокнопки з прев'ю
- Налаштування Google Analytics: безпечне поле для Measurement ID (`G-XXXXXXXXXX`) або довільний код
- Коди верифікації пошукових систем і сервісів через repeatable-таблицю (Google Search Console, Yandex Webmaster, WOT, Bing, Baidu, Pinterest)
- Оновлення шаблону стандартними засобами Joomla через сервер оновлень

## Технічні особливості

- **Joomla Web Asset Manager** — всі CSS та JS підключаються через `joomla.asset.json` з автоматичним відстеженням залежностей
- **component.php** — окремий мінімальний шаблон для модальних вікон (`?tmpl=component`)
- **Bootstrap, Bootstrap Icons** — підключені локально без зовнішніх CDN-запитів, що дає змогу оновлювати в ручному режимі до актуальної чи потрібної версії
- **Subform** для верифікаційних кодів — розширювана таблиця в адмінці без редагування коду
- Шрифти MrRobot та Press Start 2P підключені з оптимальним `font-display: swap`
- Семантична HTML-розмітка: `<header>`, `<aside>`, `<main>`, `<footer>`

## Структура файлів

```
magnum/
├── index.php              # Головний шаблон
├── component.php          # Шаблон для модальних вікон (?tmpl=component)
├── templateDetails.xml    # Маніфест шаблону, параметри адмінки
├── joomla.asset.json      # Реєстрація CSS/JS ресурсів
├── html/                  # Перевизначення компонентів і модулів
│   ├── com_content/       # Статті, категорії, featured
│   ├── com_finder/        # Пошук
│   ├── mod_menu/          # Меню
│   └── layouts/           # Пагінація, блоки інформації про статтю
├── subform/
│   └── verification_codes.xml  # Форма для кодів верифікації
├── media/
│   ├── css/               # Bootstrap, Bootstrap Icons, template.css, offline.css
│   ├── js/                # Bootstrap, jQuery, Lightbox, Prism, go_top
│   ├── fonts/             # mrrobot.woff2, bootstrap-icons.woff2
│   └── images/            # Логотипи, фони, favicon
└── language/
    └── uk-UA/             # Мовні файли (українська)
```

## Позиції модулів

| Позиція | Призначення |
|---------|-------------|
| `top-menu` | Горизонтальне меню в шапці |
| `left` | Ліва колонка (пошук, оголошення, контакти, реклама і тд) |
| `footer` | Підвал сайту |
| `debug` | Відлагоджувальна інформація Joomla |

## Встановлення

1. Завантажте архів шаблону з [Releases](https://github.com/Magnumv44/template_magnum/releases)
2. В адмінці Joomla: **Система → Встановлення → Розширення** → завантажте архів та встановіть шаблон
3. Активуйте шаблон: **Система → Стилі сайту** → встановіть як шаблон за замовчуванням
4. Налаштуйте параметри потрібні вам: **Система → Стилі сайту → Magnum news template for Joomla 6** → натисніть "**Зберегти й закрити**" по закінченню

## Вимоги

- Joomla 6.0 або новіша
- PHP 8.1+

## Ліцензія

[MIT License](LICENSE "Ліцензійна угода")
