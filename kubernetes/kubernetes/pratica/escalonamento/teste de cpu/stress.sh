#!/bin/bash
for i in {1..10000}; do
  curl localhost:30123
  sleep $1
done
