#!/bin/bash

#download the content folder from the production server
rm -rf ./content
scp -r martin@129.194.69.29:www/content .