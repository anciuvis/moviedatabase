select count(distinct `productName`) as 'product count', productLine from products
group by products.productLine
// kiek kievienoje product linijoje yra skirtingu produktu

select sum(`quantityInStock`) as 'Qty sum', sum(`quantityInStock`*`MSRP`) as 'Total stock value', productLine from products
where MSRP > 100
group by products.productLine
order by sum(`quantityInStock`*`MSRP`) desc
//

select `customerName`, `contactLastName`, `contactFirstName`, `country`, `lastName`, `firstName` from customers
INNER JOIN employees on `customers`.`salesRepEmployeeNumber` = `employees`.`employeeNumber`
where `country` in('France', 'USA')
Order by `contactLastName`, `contactFirstName`
//

select `orderNumber`, `orderdetails`.`productCode`, `productName`, `productLine`, `MSRP`-`priceEach` as 'Discount' from orderdetails
inner join `products` on `products`.`productCode` = `orderdetails`.`productCode`
where `productLine` in('Classic Cars', 'Vintage Cars', 'Motorcycles')
order by `orderNumber` asc, `MSRP`-`priceEach` desc
//

SELECT `customerName`, `orders`.`orderNumber`, `orderDate`, sum(`quantityOrdered`*`priceEach`) AS 'total amount on order' FROM customers
INNER JOIN `orders` ON `orders`.`customerNumber` = `customers`.`customerNumber`
INNER JOIN `orderdetails` ON `orderdetails`.`orderNumber` = `orders`.`orderNumber`
GROUP BY `orderNumber`
ORDER BY `customerName` ASC, `orderDate` ASC
//

SELECT `customerNumber` FROM `customers`
WHERE `salesRepEmployeeNumber` IN (SELECT `employeeNumber` FROM `employees` WHERE `officeCode` = 1)
// isrenka tik tuos klientus, kuriuos aptarnauja pirmas ofisas (newyork'o kodas)

DELETE FROM orderdetails WHERE orderNumber IN (SELECT orderNumber FROM orders WHERE customerNumber= 144 );
DELETE FROM orders WHERE customerNumber= 144;
DELETE FROM payments WHERE customerNumber= 144;
DELETE FROM customers WHERE customerNumber= 144;
// istrina kliento irasa, bei visus su juo susijusiu irasus - pradziai reikia istrinti
