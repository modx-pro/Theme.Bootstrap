# Theme.Bootstrap

Базовая тема для MODx Revolution на основе [Bootstrap 5](https://getbootstrap.com/).

## Возможности

- Bootstrap 5.3.8
- Интеграция с pdoTools (pdoMenu, pdoCrumbs, pdoTitle, pdoPage) — без дополнительных сниппетов
- Адаптивная навигация с dropdown
- Готовые чанки для меню, хлебных крошек, списков и пагинации
- Опция «Использовать jQuery» в настройках пакета

## Установка

1. Скачайте пакет и установите через Package Management в MODx.
2. Создайте шаблон на основе `bootstrap` или назначьте его документам.
3. Подключите чанки: Head, Navbar, Footer, Crumbs, Content.

При обновлении с 4.0.x перезапишите чанки Head, Navbar, Footer и Crumbs (или включите update чанков при сборке) — иначе останется старый markup и JS в Footer.

Опция jQuery подключает **4.0.0** (не 3.x). Для старых плагинов может понадобиться [jQuery Migrate](https://github.com/jquery/jquery-migrate).

## Чанки

| Чанк | Назначение |
|------|------------|
| Head / Meta / Scripts | `<head>`, OG/canonical, JS |
| Navbar + Menu.* | Меню (`pdoMenu`) |
| Crumbs + Crumbs.* | Хлебные крошки (`pdoCrumbs`) |
| Content | Текст ресурса |
| Content.List + Tpl.Card | Список дочерних + карточки (`pdoPage`) |
| Page.* | Пагинация Bootstrap |

Для раздела-каталога в контент или шаблон добавьте `[[$Content.List]]`.

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

4.1.0 — Bootstrap 5.3.8, jQuery 4.0.0, расширенные чанки.
