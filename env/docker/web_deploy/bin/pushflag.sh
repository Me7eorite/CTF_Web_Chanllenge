#!/bin/bash

echo $FLAG > /flag
chmod 644 /flag
export FLAG=not_flag
FLAG=not_flag