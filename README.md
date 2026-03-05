# Блог о картинах (Laravel)

Мини‑проект на Laravel: “галерея картин” + деталка + избранное (только для авторизованных).

## Что умеет

- Главная страница (`/`): блок “избранное/featured”, блок “интересные факты” (рандом), блок “известные картины” (по популярности).
- Детальная страница картины (`/pictures/{id}`): просмотр информации + **счётчик просмотров**.
- Избранное: добавить/удалить из избранного (**только после входа**).
- Профиль (`/profile`): список избранных картин пользователя.

## Быстрый старт (локально)

1) Установить зависимости:

```bash
composer install
```

2) Создать `.env` и ключ приложения:

```bash
cp .env.example .env
php artisan key:generate
```

3) Миграции + сиды (заполнить БД картинами):

```bash
php artisan migrate:fresh --seed
```

4) Запуск:

- Через Laravel Herd: просто открыть домен проекта в Herd
- Или через встроенный сервер:

```bash
php artisan serve
```

## Архитектура (очень коротко)

Laravel использует MVC:

- **Routes**: `routes/web.php` — какие URL существуют и куда ведут
- **Controllers**: `app/Http/Controllers/*` — логика “что достать из БД и какую страницу показать”
- **Models**: `app/Models/*` — работа с таблицами БД и связями
- **Views (Blade)**: `resources/views/*` — HTML‑шаблоны страниц

Схема запроса:

`браузер → route → controller → model (SQL) → view (HTML)`

## Основные маршруты

- `GET /` → `PictureController@index`
- `GET /pictures/{picture}` → `PictureController@show`
- `GET /profile` (auth) → `ProfileController@index`
- `POST /pictures/{picture}/favorite` (auth) → `FavoriteController@store`
- `DELETE /pictures/{picture}/favorite` (auth) → `FavoriteController@destroy`

## База данных

Миграции: `database/migrations/*`

- `pictures` — таблица картин (в т.ч. `views_count`, `is_featured`)
- `favorites` — связь “пользователь ↔ картина” (many‑to‑many) + `unique(user_id, picture_id)`

Сиды: `database/seeders/*`

- `DatabaseSeeder` создаёт тест‑пользователя и запускает `PictureSeeder`

## Тесты

Тесты приведены к текущему функционалу проекта (избранное/картинки/логин/регистрация):

```bash
php artisan test
```

## Как защищать (готовый мини‑скрипт)

1) “Проект на Laravel по MVC: роуты ведут в контроллеры, контроллеры берут данные через модели и отдают Blade‑вьюхи.”
2) “Авторизация защищает профиль и избранное через middleware `auth` + CSRF токены во всех формах.”
3) “Избранное реализовано как many‑to‑many связь `users ↔ pictures` через таблицу `favorites` с уникальным индексом от дублей.”
4) “Добавлен счётчик просмотров `views_count` (инкремент на деталке).”
5) “Сделал рефактор вьюх: общий layout + вынес стили в отдельные CSS, чтобы убрать дублирование и упростить поддержку.”

