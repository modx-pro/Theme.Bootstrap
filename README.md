# Theme.Bootstrap

Базовая тема для MODx Revolution на основе [Bootstrap 5](https://getbootstrap.com/).

## Возможности

- Bootstrap 5.3.8
- Интеграция с pdoTools (pdoMenu, pdoCrumbs, pdoTitle) — без дополнительных сниппетов
- Адаптивная навигация с dropdown
- Опция «Использовать jQuery» в настройках пакета

## Установка

1. Скачайте пакет и установите через Package Management в MODx.
2. Создайте шаблон на основе `bootstrap` или назначьте его документам.
3. Подключите чанки: Head, Navbar, Footer, Crumbs, Content.

## Структура

```
core/components/themebootstrap/
├── elements/          — шаблоны, чанки
├── lexicon/           — переводы
└── docs/              — документация

assets/components/themebootstrap/
├── css/               — Bootstrap CSS
└── js/                — Bootstrap JS, jQuery (опционально)
```

## Версия

4.0.1 — Bootstrap 5.3.8, исправления dropdown и viewport.
