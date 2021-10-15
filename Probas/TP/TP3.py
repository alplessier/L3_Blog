import numpy as np
import random
import matplotlib.pyplot as plt
from scipy.stats import norm 


def ex1():
   moy        = 0
   ecart_type = []
   i          = 0

   confiture = [0.499,0.509,0.501,0.494,0.498,0.497,0.504,0.506,0.502,0.496,0.495,0.493,0.507,0.505,0.503,0.491]

   for i in range(len(confiture)):
      moy = moy+confiture[i]

   moy = moy/len(confiture)

   for i in range(len(confiture)):
      ecart_type.append(confiture[i]-moy)
      ecart_type[i] = ecart_type[i]**2

   ec = np.sqrt(sum(ecart_type)/len(confiture))

   print("Moyenne Empirique : {}".format(moy))
   print("Ecart-type        : {}".format(ec))
   print()
   plt.hist(confiture,bins=10,density=1,label='Pots')
   x = np.linspace(0.45, 0.55, 100)
   plt.plot(x, norm.pdf(x, moy,ec),label='$\mu={}, \sigma={}$'.format(moy,ec))
   plt.xlabel('Valeur')
   plt.ylabel('Frequence')

   plt.legend()
   plt.show()

   #1ER
   interGauche = moy - (norm.ppf(0.95, loc =0, scale = 1) *(ec/np.sqrt(len(confiture))))
   interDroite = moy + (norm.ppf(0.95, loc =0, scale = 1) *(ec/np.sqrt(len(confiture))))
   print("95 % de confiance : [{} ; {}]".format(interGauche,interDroite))
   interGauche = moy - (norm.ppf(0.99, loc =0, scale = 1) *(ec/np.sqrt(len(confiture))))
   interDroite = moy + (norm.ppf(0.99, loc =0, scale = 1) *(ec/np.sqrt(len(confiture))))
   print("99 % de confiance : [{} ; {}]".format(interGauche,interDroite))
   print()
   print()

   #2EME
   print("########### AVOCAT ###########")
   print()

   moy        = 0
   ecart_type = []
   i          = 0

   avocat = [85.06,91.44,87.93,89.02,87.28,82.34,86.23,84.16,88.56,90.45,84.91,89.90,85.52,86.75,88.54,87.90]

   for i in range(len(avocat)):
      moy = moy+avocat[i]

   moy = moy/len(avocat)
   print("Moyenne Empirique : {}".format(moy))

   for i in range(len(avocat)):
      ecart_type.append(avocat[i]-moy)
      ecart_type[i] = ecart_type[i]**2

   ec = np.sqrt(sum(ecart_type)/len(avocat))
   print("Ecart-type        : {}".format(ec))
   print()
   interGauche = moy - (norm.ppf(0.95, loc =0, scale = 1) *(ec/np.sqrt(len(avocat))))
   interDroite = moy + (norm.ppf(0.95, loc =0, scale = 1) *(ec/np.sqrt(len(avocat))))
   print("95 % de confiance : [{} ; {}]".format(interGauche,interDroite))


def ex2():

   num = 500
   freq = float(95)/float(num)

   interGauche = (freq - ((norm.ppf(0.99, loc =0, scale = 1))*(np.sqrt(freq*(1-freq))/np.sqrt(num))))*500
   interDroite = (freq + ((norm.ppf(0.99, loc =0, scale = 1))*(np.sqrt(freq*(1-freq))/np.sqrt(num))))*500
   print("99 % de confiance : [{} ; {}]".format(interGauche,interDroite))
   print()

def ex3():

   #N = 100
   nbr = 100
   s = np.random.binomial(1, 0.5, nbr)
   f = 0
   for i in range(len(s)):
      if(s[i] == 1):
         f +=1

   f = float(f)/float(nbr)
   

   interGauche = (f - ((norm.ppf(0.95, loc =0, scale = 1)/np.sqrt(nbr) * np.sqrt(f*(1-f)))))
   interDroite = (f + ((norm.ppf(0.95, loc =0, scale = 1)/np.sqrt(nbr) * np.sqrt(f*(1-f)))))
   print("Pour n = 100      | 95 % de confiance : [{} ; {}]".format(interGauche,interDroite))

   #N = 1000
   nbr = 1000
   s = np.random.binomial(1, 0.5, nbr)
   f = 0
   for i in range(len(s)):
      if(s[i] == 1):
         f +=1

   f = float(f)/float(nbr)
   

   interGauche = (f - ((norm.ppf(0.95, loc =0, scale = 1)/np.sqrt(nbr) * np.sqrt(f*(1-f)))))
   interDroite = (f + ((norm.ppf(0.95, loc =0, scale = 1)/np.sqrt(nbr) * np.sqrt(f*(1-f)))))
   print("Pour n = 1 000    | 95 % de confiance : [{} ; {}]".format(interGauche,interDroite))

   #N = 10 000
   nbr = 10000
   s = np.random.binomial(1, 0.5, nbr)
   f = 0
   for i in range(len(s)):
      if(s[i] == 1):
         f +=1

   f = float(f)/float(nbr)
   

   interGauche = (f - ((norm.ppf(0.95, loc =0, scale = 1)/np.sqrt(nbr) * np.sqrt(f*(1-f)))))
   interDroite = (f + ((norm.ppf(0.95, loc =0, scale = 1)/np.sqrt(nbr) * np.sqrt(f*(1-f)))))
   print("Pour n = 10 000   | 95 % de confiance : [{} ; {}]".format(interGauche,interDroite))

 #N = 100 000
   nbr = 100000
   s = np.random.binomial(1, 0.5, nbr)
   f = 0
   for i in range(len(s)):
      if(s[i] == 1):
         f +=1

   f = float(f)/float(nbr)
   

   interGauche = (f - ((norm.ppf(0.95, loc =0, scale = 1)/np.sqrt(nbr) * np.sqrt(f*(1-f)))))
   interDroite = (f + ((norm.ppf(0.95, loc =0, scale = 1)/np.sqrt(nbr) * np.sqrt(f*(1-f)))))
   print("Pour n = 100 000  | 95 % de confiance : [{} ; {}]".format(interGauche,interDroite))

   #N = 1 000 000
   nbr = 1000000
   s = np.random.binomial(1, 0.5, nbr)
   f = 0
   for i in range(len(s)):
      if(s[i] == 1):
         f +=1

   f = float(f)/float(nbr)
   

   interGauche = (f - ((norm.ppf(0.95, loc =0, scale = 1)/np.sqrt(nbr) * np.sqrt(f*(1-f)))))
   interDroite = (f + ((norm.ppf(0.95, loc =0, scale = 1)/np.sqrt(nbr) * np.sqrt(f*(1-f)))))
   print("Pour n = 1 000 000| 95 % de confiance : [{} ; {}]".format(interGauche,interDroite))





def main():

   #EX 1
   print("############ EX 1 ############")
   print("########## CONFITURE #########")
   print()
   ex1()
   print()
   print("############ EX 2 ############")
   print()
   ex2()
   print("############ EX 3 ############")
   print()
   ex3()



main()
