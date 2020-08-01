create table if not exists telegram_update (
    id integer primary key autoincrement,
    update_id integer not null unique
);