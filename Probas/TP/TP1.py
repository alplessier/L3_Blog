import numpy as np
import matplotlib.pyplot as plt

############ EXERCICE 1 ############

#MOYENNE X
def moyX(X):

   moyX = 0
   for i in range(len(X)):
      moyX = moyX + X[i]
   
   return float(moyX)/float(len(X))

#MOYENNE Y
def moyY(Y):

   moyY = 0
   for i in range(len(Y)):
      moyY = moyY + Y[i]
   
   return float(moyY)/float(len(Y))

# MOY X*Y
def moyXY(X,Y):

   moyXY = 0
   for i in range(len(X)):
      moyXY = moyXY + (X[i]*Y[i])
   
   return float(moyXY)/float(len(X))


# COVARIANCE
def cov(X,Y):

   # TEST TAILLE TABLEAUX
   if(len(X) != len(Y)):
      print("La tailles des tableaux sont differents")
      exit()

   return moyXY(X,Y)-(moyX(X)*moyY(Y))



# VARIANCE X
def var(X):

   moyX_carre = 0
   carre_moyX = 0

   #MOYENNE X_CARRE
   for i in range(len(X)):
      moyX_carre = moyX_carre + (X[i]*X[i])
   
   moyX_carre = float(moyX_carre) / float(len(X))

   #CARRE MOYENNE
   for i in range(len(X)):
      carre_moyX = carre_moyX + X[i]
   
   carre_moyX = float(carre_moyX) / float(len(X))
   carre_moyX = carre_moyX * carre_moyX

   return moyX_carre - carre_moyX


def regLin(X,Y):
   
   #TEST TAILLE TABLEAUX
   if(len(X) != len(Y)):
      print("La tailles des tableaux sont differents")
      exit()
   
   #COEFFICIENT A
   a = cov(X,Y)/var(X)

   #COEFFICENT B
   b = moyY(Y) - (a*moyX(X))

   return [a,b]


def afficheReg(X,Y,e,pas):
   x = np.array(X)
   y = np.array(Y)

   for i in range(len(X)):
      plt.scatter(X[i],Y[i], c='red')
   

   x1 = [X[0],X[len(X)-1]]
   y1 = [regLin(X,Y)[0]*X[0] + regLin(X,Y)[1],regLin(X,Y)[0]*X[len(X)-1] + regLin(X,Y)[1]]
   y2 = [formeMatricielle(X,Y)[1]*X[0] + formeMatricielle(X,Y)[0],formeMatricielle(X,Y)[1]*X[len(X)-1] + formeMatricielle(X,Y)[0]]
   y3 = [gradient(X, Y,e,pas)[0]*X[0] + gradient(X, Y,e,pas)[1],gradient(X, Y,e,pas)[0]*X[len(X)-1] + gradient(X, Y,e,pas)[1]]

   plt.plot(x1,y1,label="modele simple")
   plt.plot(x1,y2,label="modele vectoriel",c='red')
   plt.plot(x1,y3,"r--",c='b',label="gradient")
   plt.xlabel("Chaleur (en °C)")
   plt.ylabel("Rendement (en %)")

   plt.legend()
   plt.show()

def formeMatricielle(X,Y):

   un = []

   for i in range(len(X)):
      un.append(1)
   
   X = [un,X]
   np.array(X)
   X = np.transpose(X)
   X_t = np.transpose(X)

   X_tX = np.dot(X_t,X)   # CALCUL DE Xtranspose * X

   # CALCUL DE l'inverse de Xtranspose * X
   inv_X_tX = [[(float(1)/float((X_tX[0][0]*X_tX[1][1])-(X_tX[0][1]*X_tX[1][0]))) * X_tX[1][1],(float(1)/float((X_tX[0][0]*X_tX[1][1])-(X_tX[0][1]*X_tX[1][0]))) * (X_tX[0][1]*(-1))],
              [(float(1)/float((X_tX[0][0]*X_tX[1][1])-(X_tX[0][1]*X_tX[1][0]))) * (X_tX[1][0]*(-1)),(float(1)/float((X_tX[0][0]*X_tX[1][1])-(X_tX[0][1]*X_tX[1][0]))) * X_tX[0][0]]]

   # CALCUL DE Xtranspose * Y
   X_tY = np.dot(X_t,Y)

   #RESULTAT FINAL
   final = np.dot(inv_X_tX,X_tY)
   return final

# Gradient du paramètre m
def a_grad(a, b, X, Y):
    return sum(-2 * x * (Y[idx] - (a * x + b)) for idx, x in enumerate(X)) / float(len(X))

# Gradient du paramètre b
def b_grad(a, b, X, Y):
    return sum(-2 * (Y[idx] - (a * x + b)) for idx, x in enumerate(X)) / float(len(X))

def gradient(X, Y,e,pas):
   assert(len(X) == len(Y))

   #ON PART D'UNE DROITE CREER PAR LES DEUX POINT DES EXTREMITES
   a = float(Y[len(Y)-1] - Y[0])/float(X[len(X)-1] - X[0])
   ainit = 0
   b = float(Y[0] - a * X[0])
   i = 0

   while((a-ainit) > e):
      i += 1
      ainit = a
      binit = b
      a = a - pas * a_grad(a, b, X, Y)
      b = b - pas * b_grad(a, b, X, Y)


      if(a-ainit < e):
         return a, b,i



# JEU DE DONNEES
X = [45,50,55,60,65,70,75,80,85,90]
Y = [43,45,48,51,55,57,59,63,66,68]



def main():

   e   = 0.00001
   pas = 0.0001 

   print("######### 1.1 #########")
   print()
   print("RETOUR FONCTION : A = {} et B = {}".format(regLin(X,Y)[0],regLin(X,Y)[1]))
   print("RETOUR NUMPY    : A = {} et B = {}".format(np.polyfit(X,Y,1)[0],np.polyfit(X,Y,1)[1]))
   print()
   print("######### 1.2 #########")
   print()
   print("RETOUR FONCTION : A = {} et B = {}".format(formeMatricielle(X,Y)[1],formeMatricielle(X,Y)[0]))
   print()
   print("######### 2.1 GRADIENT #########")
   print()
   a,b,i = gradient(X,Y,e,pas)
   print("A = {}".format(a))
   print("B = {}".format(b))
   print("En {} iterations".format(i))
   print()
   print("######### DEBUT AFFICHAGE #########")
   afficheReg(X,Y,e,pas)
   print("#########  FIN AFFICHAGE  #########")

   

   




########### EXECUTION MAIN ###########

main()