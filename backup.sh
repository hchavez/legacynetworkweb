#!/bin/sh

cd storage/app/
for file in *.sql; do
	    tar cvzf "${file}".tar.gz "${file}"
	        rm "${file}"
	done
