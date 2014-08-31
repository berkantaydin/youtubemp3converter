#!/bin/bash
while read line;
do
    cat "$line" >> "$2"
    echo "--- $line -> $2"
done < "$1"
