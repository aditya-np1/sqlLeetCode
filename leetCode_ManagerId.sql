# Write your MySQL query statement below
--  select count(id) group by id  
/* Write your T-SQL query statement below */
-- select name from Employee where 
select Name from Employee as main join
 ( select managerId from Employee group by managerId having count(managerId)>=5) as temp
 on temp.managerId = main.id
-- select main.name from Employee as temp inner join Employee as main on 
--  temp.managerId= main.id
-- group by temp.managerId
-- having count(temp.id)>=5