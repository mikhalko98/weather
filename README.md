# weather

Задание которые выпольняет скрип этого репозитория описано в файлах: week_2_3/task1_task2/task1.txt, week_2_3/task1_task2/task2.txt.


Изначально скрипт использовал API для почасового прогноза погоды: http://api.openweathermap.org/data/2.5/forecast/hourly?q=%s%s&units=metric&appid=%s. 
Но спустя время openweathermap.org ограничели возможность бесплатного использования api почасового прогноза. 
По этому, было принято решение использовать api которое возвращает погоду каждые 3 часа. 