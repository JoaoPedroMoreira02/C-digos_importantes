import mysql.connector 
running = True
try:
    mydb = mysql.connector.connect(
    host="localhost",                
    user="root",
    password="",
    database="bd_cadastro"
)
except:
    print("Erro ao conectar com a base de dados.")
    running = False

class Pessoas:
    nome = ""
    sobrenome = ""
    telefone = ""
    email = ""

    def __init__(self) -> None:
        print("Obejto instanciado")
    
    def printDados(self):
        print(self.nome)
        print(self.sobrenome)
        print(self.telefone)
        print(self.email)

usuários = []


while running == True:
    print("ESCOLHA UMA OPÇÃO")
    print("--"*30)
    print("1 -- Cadastrar usuário")
    print("2 -- Pesquisar usuário por código")
    print("3 -- Exibir todos os usuários")
    print("4 -- remover usuário")
    print("5 -- Salvar")
    print("6 -- Encerrar máquina")



    escolha = int(input("digite sua escolha: "))
    
    if escolha == 1:
        n = 0
        quantidade = int(input("Quantos usuários deseja cadastrar?: "))
        
        while n < quantidade:
            a = Pessoas()
            a.nome = input("digite o nome: ")
            a.sobrenome = input("Digite o seu sobrenome: ")
            a.telefone = input("Digite o seu telefone: ")
            a.email = input("Digite o seu email: ")
            usuários.append(a)
            n = n + 1

    elif escolha == 2: 
        cod = input("Digite o código: ")
        mycursor = mydb.cursor()
        sql = "SELECT * FROM tb_pessoas WHERE ID ='"+cod+"'"
        mycursor.execute(sql)
        myresult = mycursor.fetchall()
        for x in myresult: 
            print(x)
    
    elif escolha == 3: 
        mycursor = mydb.cursor()
        mycursor.execute("SELECT * FROM tb_pessoas")
        myresult = mycursor.fetchall()
        for x in myresult: 
            print(x)

    elif escolha == 4: 
        cod = input("Digite o código: ")
        sql = "DELETE FROM tb_pessoas WHERE ID = '"+cod+"'"
        mycursor.execute(sql)
        mydb.commit()
        print(mycursor.rowcount, "registro(s) removido(s)")

    elif escolha == 5: 
        for usuário in usuários:
            mycursor = mydb.cursor()
            sql = "INSERT INTO tb_pessoas (NOME, SOBRENOME, TELEFONE, EMAIL) VALUES (%s,%s,%s,%s)"
            val = (usuário.nome, usuário.sobrenome, usuário.telefone, usuário.email)
            mycursor.execute(sql, val)
            mydb.commit()
            print(mycursor.rowcount, "Usuário cadastrado")


    elif escolha == 6:
        running = False

    else:
        print("Opção inválida, tente novamente.")