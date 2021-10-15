# Ecrit par Alexis PLESSIER - Charly BEC - Hugo PUC


def fun(n):
   
   l      = []
   clause = []

   for j in range(n): # on rentre les valeurs 0 ou 1 dans les variables positives.
      while True:
         a = int(input("Valeur de x{} (0 ou 1): ".format(j+1)))
         if a>= 0 and a < 2:
            break

      print() 
      if(a == 0): # rentre les variables positives et négatives dans un liste             
         l.insert(j,a)
         l.insert(j+n,a+1)
      else :
         l.insert(j,a)
         l.insert(j+n,a-1)

   nbClause = int(input("Combien y a t-il de Clauses ? : ")) # on rentre le nombre de clauses
   s = ""

   print()
   for i in range(nbClause):
      print("() ", end='')
   
   print()
   print()
   print("La selection se fait comme suit : de 1 à {} = de x1 à x{} - de {} à {} = de _x1 à _x{}".format(n,n,n+1,2*n,n))
   print()
   

   for i in range(nbClause): # On créé les clauses en rentrant les variables qu'on veut
      

      choix1 = int(input("Choix 1 : "))
      choix2 = int(input("Choix 2 : "))
      print()

      # on va regarder si les variables sont positives ou négatives.

      if(choix1<=n and choix2<=n): 
         s = s + "(x{} OU x{}) ET ".format(choix1,choix2)

      
      elif(choix1<=n and choix2>n and choix1+n != choix2):
         s = s + "(x{} OU _x{}) ET ".format(choix1,choix2-n)


      elif(choix1>n and choix2>n):
         s = s + "(_x{} OU _x{}) ET ".format(choix1-n,choix2-n)


      elif(choix1>n and choix2<=n and choix2+n != choix1):
         s = s + "(_x{} OU x{}) ET ".format(choix1-n,choix2)


      clause.insert(i,l[choix1-1] or l[choix2-1]) # mets dans un tableau le résultats de chaque clause
    
      

      print(s[0:len(s)-4])

   for i in range(1,len(clause)): # on test les ET logique un par un en ajoutant les valeurs booléennes des clauses
      clause[0] = clause[0] and clause[i]

   print()     
   print("RESULTAT = {}".format(bool(clause[0]))) # affichage du résultats de la formule qui est une conjonction de disjonctions.
         

saisie = int(input("Combien de variables avez vous ? : "))
fun(saisie)