import pandas as pd
import schedule
import time
from openpyxl import Workbook

import mysql.connector

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

# Menjadwalkan pembaruan setiap 4 detik (sesuaikan dengan kebutuhan Anda)
schedule.every(4).seconds.do(update_excel)

while True:
    schedule.run_pending()
    time.sleep(1)
