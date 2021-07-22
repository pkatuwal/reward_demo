## Question 2
```sql
select
    sum(
        case
            when Sales_Type = 'Normal' THEN op.Normal_Price
            when Sales_Type = 'Promotion' THEN op.Promotion_Price
        end
    ) Total_Sales_Amount,
    count(o.Order_ID) Number_Of_Order
from
    Orders o,
    Orders_Products op
where
    o.Order_ID = op.Order_ID
```

## Question 3 

Actually I dont understand the word **Order  total MYR5.00**.
Main Logic of GST and Actual price calculation method done by following process.
```php
gstAmount = (ActualCost x GST%)/100
ActualAmount = ActualCost +gstAmount

```