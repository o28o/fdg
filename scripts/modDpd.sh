
cd /var/www/dpd-db/exporter/webapp/

sed -i '/transition:/d' static/home.css
sed -i '/id="summary-toggle"/ s/ checked//' ru_templates/home.html templates/home.html


exit 0

cd /var/www/
git clone https://github.com/digitalpalidictionary/dpd-db
cd dpd-db
wget latest dpd.db.tar.bz  from https://github.com/digitalpalidictionary/dpd-db/releases
tar -xvjf dpd.db.tar.bz2


git fetch --tags  # Получаем теги из репозитория
git tag --sort=-v:refname  # Выводим список тегов, отсортированных по убыванию версии
latest_tag=$(git tag --sort=-v:refname | head -n 1)  # Получаем последний тег
git checkout "$latest_tag"  # Переключаемся на него

