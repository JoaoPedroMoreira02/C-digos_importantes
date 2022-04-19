import mysql.connector 

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="bd_cadastro"
)

mycursor = mydb.cursor()

mycursor.execute("SELECT * FROM tb_pessoas")

myresult = mycursor.fetchall()

for x in myresult: 
    print(x)










