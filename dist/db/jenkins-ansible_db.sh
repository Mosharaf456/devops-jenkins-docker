#!/bin/bash
set -e 

counter=0
while [ $counter -lt 10 ]; do
    let counter=counter+1

    name=$(nl people.txt | grep -w $counter | awk '{print $2}' | awk -F ',' '{print $1}')
    lastname=$(nl people.txt | grep -w $counter | awk '{print $2}' | awk -F ',' '{print $2}')
    age=$(shuf -i 20-25 -n 1)
    echo "Name: $name, id: $counter, Lastname: $lastname, age: $age"

    mysql -u root -pbrotecs1230 people -e "insert into register values($counter, '$name', '$lastname', $age)"
    echo "inserted data $counter $name $lastname $age to the database people"
done

# docker cp people.txt  test-db:/tmp

