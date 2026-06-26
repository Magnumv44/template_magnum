<?php
/**
 * @package     joomla.site
 * @subpackage  templates.magnum
 * @copyright 2005-2026 Magnum
 * @license MIT; see LICENSE https://github.com/Magnumv44/template_magnum/blob/main/LICENSE
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

/** @var Joomla\CMS\Document\ErrorDocument $this */

if (!isset($this->error)) {
    $this->error = new Exception(Text::_('JERROR_ALERTNOAUTHOR'));
    $this->debug = false;
}

// Підключаємо стилі шаблону
$jwa = $this->getWebAssetManager();
$jwa->useStyle('template.error.style');

// Заголовок сторінки
$this->setTitle($this->error->getCode() . ' - ' . htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'));

// Код помилки
$errorCode = $this->error->getCode();

// Отримуємо кольори з параметрів шаблону
$validateColor = function(string $color, string $default): string {
    return preg_match('/^#[0-9A-Fa-f]{6}$/', $color) ? $color : $default;
};

$colorPrimary = $validateColor($this->params->get('colorPrimary', '#434343'), '#434343');
$colorAccent = $validateColor($this->params->get('colorAccent', '#ffad29'), '#ffad29');
$colorLink = $validateColor($this->params->get('colorLink', '#0080c0'), '#0080c0');

// Отримуємо та обробляємо фрази для поточного коду помилки
$params = $this->params;
$getPhrases = function(string $paramName, string $default) use ($params) {
    $raw = $params->get($paramName, $default);
    $phrases = array_values(array_filter(
        array_map('trim', explode("\n", $raw))
    ));
    return array_map(function($p) {
        return htmlspecialchars($p, ENT_QUOTES, 'UTF-8');
    }, $phrases);
};

// Фрази за замовчуванням для кожного коду помилки
$defaultPhrases = [
    404 => implode("\n", [
        'Схоже, ця сторінка пішла в баг-трекер і не повернулась...',
        '404: сторінка успішно загублена. Команда розробників сповіщена. Можливо.',
        'Ти знайшов місце, де живуть всі мертві посилання. Привіт від них.',
        'Ця URL-адреса більше не існує. Як і мій дедлайн три тижні тому.',
        'Сторінка не знайдена. Зате ти знайшов час прочитати це повідомлення.',
        'ERROR 404: сторінка зникла. Рекомендую перевірити під диваном.',
        'Хтось видалив цю сторінку. Швидше за все це був я. Вибач.',
        'Ця URL-адреса веде в нікуди. Схоже на більшість моїх git push --force.',
    ]),
    403 => implode("\n", [
        'Стоп. Далі не пустять навіть з печивом.',
        'Тут написано "вхід заборонено". Але ти вже прочитав це — значить майже всередині.',
        'Access denied. Пароль "admin123" теж не підійде, вже перевіряли.',
        'Ця сторінка захищена. Приблизно як мій щоденник у 2007 році.',
        'Тут потрібні права адміністратора. Або хабар. Ми приймаємо каву.',
        '403: ти не Гендальф, і тут теж не пройдеш.',
    ]),
    500 => implode("\n", [
        'Щось пішло не так. Серйозно не так. Можливо, дуже серйозно.',
        'Сервер впав у депресію. Ми вже надсилаємо йому мотиваційні листи.',
        'ERROR 500: внутрішня помилка. Зовнішні помилки ми вже виправили.',
        'Сервер зламався. Але ти молодець що взагалі зайшов.',
        'Щось вибухнуло на сервері. Не буквально. Сподіваємось.',
        'Помилка 500 — це коли програміст пише TODO і забуває про нього на рік.',
    ]),
    503 => implode("\n", [
        'Сайт тимчасово недоступний. Як і натхнення в понеділок вранці.',
        'Ми на технічному обслуговуванні. Або п\'ємо каву. Одне з двох.',
        'SERVICE UNAVAILABLE: сервіс узяв відпустку без попередження.',
        'Зачекайте трохи. Ми вже майже все полагодили. Майже.',
        'Сайт на обслуговуванні. Повертайтесь через хвилину, годину або вечність.',
    ]),
    401 => implode("\n", [
        'Хто ти такий? Ми тебе не знаємо. Авторизуйся.',
        'Потрібна авторизація. Пароль "qwerty" вже пробували — не підійшов.',
        '401: ти не представився. Це невихованість.',
        'Ця сторінка тільки для своїх. Зареєструйся і повертайся.',
        'Авторизація потрібна. Або просто познайомся з адміністратором.',
    ]),
];

// Визначаємо параметр фраз залежно від коду помилки
$phraseParam = 'error_phrases_' . $errorCode;
$defaultPhrase = $defaultPhrases[$errorCode] ?? implode("\n", [
    'Щось пішло не так. Дуже не так.',
    'Невідома помилка. Навіть ми не знаємо що сталось.',
]);

$phrases = $getPhrases($phraseParam, $defaultPhrase);

// Час до автоматичного редіректу (в секундах), з обмеженням 5-300 для захисту від некоректних значень
$redirectSeconds = (int) $this->params->get('error_redirect_seconds', 15);
$redirectSeconds = max(5, min(300, $redirectSeconds));

// Чи показувати таймер редіректу (лише для 404)
$showRedirect = ($errorCode === 404);
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <jdoc:include type="metas" />
    <jdoc:include type="styles" />
    <style>
        :root {
            --color-primary: <?php echo $colorPrimary; ?>;
            --color-accent: <?php echo $colorAccent; ?>;
            --color-link: <?php echo $colorLink; ?>;
        }
    </style>
</head>
<body class="error-page">
    <div class="scanline"></div>
    <div class="error-wrapper">
        <div class="error-label"><?php echo Text::_('TPL_MAGNUM_ERROR_LABEL'); ?></div>
        <div>
            <span class="dot dot-1"></span>
            <span class="glitch" data-text="<?php echo $errorCode; ?>"><?php echo $errorCode; ?></span>
            <span class="dot dot-2"></span>
        </div>
        <div class="error-title">
            <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?>
        </div>
        <div class="error-divider">
            <span class="error-divider-line"></span>
            <span class="dot dot-3"></span>
            <span class="error-divider-line"></span>
        </div>
        <?php if ($errorCode === 404) : ?>
            <!-- Блок з анімованими фразами для 404 -->
            <div class="phrase-box">
                <p class="phrase-text" id="phrase-text"><span class="phrase-cursor"></span></p>
            </div>
        <?php else : ?>
            <!-- Блок з повідомленням для інших помилок -->
            <div class="error-message-box">
                <p><?php echo Text::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></p>
                <ul style="margin: 0.5rem 0 0 1.2rem; font-size: 0.85rem; color: var(--c-gray); line-height: 1.8;">
                    <?php if ($errorCode === 403 || $errorCode === 401) : ?>
                        <li><?php echo Text::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
                    <?php elseif ($errorCode === 500) : ?>
                        <li><?php echo Text::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></li>
                    <?php elseif ($errorCode === 503) : ?>
                        <li><?php echo Text::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?></li>
                    <?php else : ?>
                        <li><?php echo Text::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></li>
                    <?php endif; ?>
                    <li><?php echo Text::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></li>
                </ul>
                <?php if ($this->debug) : ?>
                    <div class="msg-code">
                        <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?>
                        <br><?php echo htmlspecialchars($this->error->getFile(), ENT_QUOTES, 'UTF-8'); ?>:<?php echo $this->error->getLine(); ?>
                    </div>
                <?php endif; ?>
            </div>
            <!-- Анімовані фрази для помилок крім 404 -->
            <div class="phrase-box">
                <p class="phrase-text" id="phrase-text"><span class="phrase-cursor"></span></p>
            </div>
        <?php endif; ?>

        <?php if ($showRedirect) : ?>
        <div class="redirect-info">
            <?php echo Text::_('TPL_MAGNUM_ERROR_REDIRECT_TEXT'); ?> <span id="countdown"><?php echo $redirectSeconds; ?></span> <?php echo Text::_('TPL_MAGNUM_ERROR_REDIRECT_SEC'); ?>
        </div>
        <?php endif; ?>
        <div class="buttons">
            <a href="<?php echo Uri::root(true); ?>/index.php" class="error-btn error-btn-primary">
                ← <?php echo Text::_('JERROR_LAYOUT_HOME_PAGE'); ?>
            </a>
            <?php if ($showRedirect) : ?>
            <button class="error-btn error-btn-outline" id="stop-btn">
                <?php echo Text::_('TPL_MAGNUM_ERROR_STOP_TIMER'); ?>
            </button>
            <?php endif; ?>
        </div>
        <?php if ($this->debug) : ?>
        <div id="techinfo">
            <?php echo $this->renderBacktrace(); ?>
            <?php if ($this->error->getPrevious()) : ?>
                <?php $loop = true; ?>
                <?php $this->setError($this->_error->getPrevious()); ?>
                <?php while ($loop === true) : ?>
                    <p><strong><?php echo Text::_('JERROR_LAYOUT_PREVIOUS_ERROR'); ?></strong></p>
                    <p>
                        <?php echo htmlspecialchars($this->_error->getMessage(), ENT_QUOTES, 'UTF-8'); ?>
                        <br><?php echo htmlspecialchars($this->_error->getFile(), ENT_QUOTES, 'UTF-8'); ?>:<?php echo $this->_error->getLine(); ?>
                    </p>
                    <?php echo $this->renderBacktrace(); ?>
                    <?php $loop = $this->setError($this->_error->getPrevious()); ?>
                <?php endwhile; ?>
                <?php $this->setError($this->error); ?>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>

    <jdoc:include type="modules" name="debug" style="none" />

    <script>
        const phrases = <?php echo json_encode($phrases, JSON_UNESCAPED_UNICODE); ?>;
        const showRedirect = <?php echo $showRedirect ? 'true' : 'false'; ?>;

        let currentPhrase = 0;
        let currentChar = 0;
        let isDeleting = false;
        let isPaused = false;
        const el = document.getElementById('phrase-text');
        const TYPING_SPEED = 45;
        const DELETING_SPEED = 20;
        const PAUSE_AFTER = 2800;
        const TIME_TO_REDIRECT = <?php echo $redirectSeconds; ?>; // Час до автоматичного редіректу в секундах

        function type() {
            if (!el || phrases.length === 0) return;

            const phrase = phrases[currentPhrase];

            if (isPaused) {
                isPaused = false;
                isDeleting = true;
                setTimeout(type, DELETING_SPEED);
                return;
            }

            if (!isDeleting) {
                currentChar++;
                el.innerHTML = phrase.slice(0, currentChar) + '<span class="phrase-cursor"></span>';
                if (currentChar === phrase.length) {
                    isPaused = true;
                    setTimeout(type, PAUSE_AFTER);
                    return;
                }
                setTimeout(type, TYPING_SPEED);
            } else {
                currentChar--;
                el.innerHTML = phrase.slice(0, currentChar) + '<span class="phrase-cursor"></span>';
                if (currentChar === 0) {
                    isDeleting = false;
                    currentPhrase = (currentPhrase + 1) % phrases.length;
                    setTimeout(type, 400);
                    return;
                }
                setTimeout(type, DELETING_SPEED);
            }
        }

        setTimeout(type, 600);

        if (showRedirect) {
            let seconds = TIME_TO_REDIRECT;
            let stopped = false;
            const countdownEl = document.getElementById('countdown');
            const stopBtn = document.getElementById('stop-btn');

            const timer = setInterval(() => {
                if (stopped) return;
                seconds--;
                countdownEl.textContent = seconds;
                if (seconds <= 0) {
                    clearInterval(timer);
                    window.location.href = '<?php echo Uri::root(true); ?>/index.php';
                }
            }, 1000);

            if (stopBtn) {
                stopBtn.addEventListener('click', () => {
                    stopped = true;
                    stopBtn.textContent = '<?php echo Text::_('TPL_MAGNUM_ERROR_TIMER_STOPPED'); ?>';
                    stopBtn.disabled = true;
                    stopBtn.style.opacity = '0.5';
                });
            }
        }
    </script>
</body>
</html>
