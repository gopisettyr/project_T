#!/bin/bash

for value in bankNiftyStockWatch.json cnxAutoStockWatch.json cnxFinanceStockWatch.json cnxFMCGStockWatch.json cnxitStockWatch.json cnxMediaStockWatch.json cnxMetalStockWatch.json cnxPharmaStockWatch.json cnxRealtyStockWatch.json niftyPvtBankStockWatch.json cnxPSUStockWatch.json
do
/usr/bin/python3 /var/www/html/project_T/export_api $value > /var/www/html/project_T/index/$value
done
