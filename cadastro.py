import mysql.connector 

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="bd_cadastro"
)

nome = input("Nome: ")
sobrenome = input("Sobrenome: ")
telefone = input("Telefone: ")
email = input("E-mail: ")

mycursor = mydb.cursor()
sql = "INSERT INTO tb_pessoas (NOME, SOBRENOME, TELEFONE, EMAIL) VALUES (%s,%s,%s,%s)"
val = (nome, sobrenome, telefone, email)
mycursor.execute(sql, val)
mydb.commit()
print(mycursor.rowcount, "Usuário cadastrado")






