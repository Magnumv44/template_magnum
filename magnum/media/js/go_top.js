// Чекаємо, поки весь HTML-документ завантажиться
document.addEventListener('DOMContentLoaded', function() {

    // Створюємо HTML-код кнопки
    const goTopHTML = '<a href="#" id="go-top"><span class="bi bi-arrow-up-short"></span></a>';

    // Додаємо HTML в кінець <body>
    document.body.insertAdjacentHTML('beforeend', goTopHTML);

    // Знаходимо додану кнопку
    const goTopButton = document.getElementById('go-top');

    // Переконуємося, що кнопка існує, перш ніж працювати з нею
    if (goTopButton) {

        // Прибираємо атрибут href
        goTopButton.removeAttribute('href');

        // Функція для перевірки, чи потрібно показати/сховати кнопку
        const checkScroll = () => {
            if (window.scrollY >= 250) {
                // Показуємо кнопку
                goTopButton.classList.add('show');
            } else {
                // Ховаємо кнопку
                goTopButton.classList.remove('show');
            }
        };

        // Перевіряємо стан прокрутки одразу при завантаженні сторінки
        checkScroll();

        // Обробник події "scroll"
        window.addEventListener('scroll', checkScroll);

        // Обробник кліку
        goTopButton.addEventListener('click', (e) => {
            // Забороняємо <a> тегу переходити за посиланням (оскільки href був #)
            e.preventDefault();

            // Плавно прокручуємо сторінку до верху
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

});