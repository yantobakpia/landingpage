import pandas as pd
import schedule
import time
import datetime
from openpyxl import Workbook
import mysql.connector
import sys

# Fungsi untuk memperbarui data Excel
def update_excel():
    # Konfigurasi koneksi ke database MySQL
    db_connection = mysql.connector.connect(
        host="localhost",  # Ganti dengan host XAMPP Anda
        user="root",       # Ganti dengan username MySQL Anda
        password="",       # Ganti dengan password MySQL Anda
        database="perusahaan"  # Ganti dengan nama database Anda
    )
    
    query = "SELECT * FROM t_prod"
    data_frame = pd.read_sql(query, db_connection)
    
    file_path = "data_excel.xlsx"
    try:
        data_frame.to_excel(file_path, sheet_name='Sheet1', index=False)
        print("Data updated successfully.")
    except Exception as e:
        print("An error occurred:", str(e))

# Memeriksa apakah token yang dimasukkan valid
def is_valid_token(entered_token):
    with open("token.txt", "r") as file:
        stored_token = file.read().strip()
        return entered_token == stored_token

# Menjalankan pembaruan otomatis jika token valid
if len(sys.argv) == 2 and sys.argv[1] == "run":
    entered_token = input("Enter your token: ")
    if is_valid_token(entered_token):
        schedule.every(4).seconds.do(update_excel)
        while True:
            schedule.run_pending()
            time.sleep(1)
        print("Automated updates started.")
    else:
        print("Invalid token. Automated updates require a valid token.")
