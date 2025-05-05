#!/bin/bash

# Скрипт установки Telegram ботов как systemd сервисов

# Создаем сервис для dgift-bot
cat > /etc/systemd/system/dgift-bot.service <<EOF
[Unit]
Description=Telegram DGift Bot Service
After=network.target

[Service]
User=www-data
Group=www-data
WorkingDirectory=/var/www/telegram_bot
Environment="PATH=/var/www/telegram_bot/telegram/bin:/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin"
ExecStart=/var/www/telegram_bot/telegram/bin/python /var/www/telegram_bot/main.py /var/www/telegram_bot/config.dgift_bot.json
Restart=always
RestartSec=10
StandardOutput=journal
StandardError=journal

[Install]
WantedBy=multi-user.target
EOF

# Создаем сервис для dhammagift-bot
cat > /etc/systemd/system/dhammagift-bot.service <<EOF
[Unit]
Description=Telegram Dhammagift Bot Service
After=network.target

[Service]
User=www-data
Group=www-data
WorkingDirectory=/var/www/telegram_bot
Environment="PATH=/var/www/telegram_bot/telegram/bin:/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin"
ExecStart=/var/www/telegram_bot/telegram/bin/python /var/www/telegram_bot/main.py /var/www/telegram_bot/config.dhammagift_bot.json
Restart=always
RestartSec=10
StandardOutput=journal
StandardError=journal

[Install]
WantedBy=multi-user.target
EOF

# Применяем изменения
systemctl daemon-reload

# Включаем автозагрузку и запускаем сервисы
systemctl enable dgift-bot --now
systemctl enable dhammagift-bot --now

# Выводим статус
echo "Статус сервисов:"
systemctl status dgift-bot dhammagift-bot --no-pager


exit 0

# Проверить статус
sudo systemctl status dgift-bot
sudo systemctl status dhammagift-bot

# Перезапустить
sudo systemctl restart dgift-bot
sudo systemctl restart dhammagift-bot

# Просмотр логов
sudo journalctl -u dgift-bot -f
sudo journalctl -u dhammagift-bot -f

