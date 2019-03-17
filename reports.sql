CREATE TEMPORARY TABLE total_bookings
SELECT b.car_id, CONCAT(c.car_make, ' ', c.car_model) AS car_name, count(b.car_id) AS number_of_bookings
FROM bookings AS b 
INNER JOIN cars AS c ON b.car_id=c.car_id 
GROUP BY b.car_id
ORDER BY count(b.car_id) DESC;

CREATE TEMPORARY TABLE successful_bookings
SELECT b.car_id, CONCAT(c.car_make, ' ', c.car_model) AS car_name, count(b.car_id) AS number_of_bookings
FROM bookings AS b 
INNER JOIN cars AS c ON b.car_id=c.car_id 
WHERE booking_status = 'completed'
GROUP BY b.car_id
ORDER BY count(b.car_id) DESC;

SELECT t.car_id AS 'Car ID'
		,t.car_name AS 'Car Name'
        ,t.number_of_bookings AS 'Total Bookings'
        ,s.number_of_bookings AS 'Successful Bookings'
        ,round(s.number_of_bookings/t.number_of_bookings*100,1) AS 'Success Rate'
FROM total_bookings AS t
LEFT JOIN successful_bookings AS s ON t.car_id=s.car_id;






SELECT cat.category_id, cat.category_name, count(cat.category_id) AS 'Successful booking number'
FROM bookings AS b 
INNER JOIN cars AS c ON b.car_id=c.car_id 
INNER JOIN categories AS cat ON c.category_id=cat.category_id
WHERE b.booking_status='completed' AND b.booking_real_end_date >= (CURDATE() - INTERVAL 1 MONTH )
GROUP BY cat.category_id;