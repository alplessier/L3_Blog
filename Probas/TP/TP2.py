import numpy as np
import random
import matplotlib.pyplot as plt
from scipy.stats import norm 
from scipy.stats import expon 

def combin(n, k):
   #Nombre de combinaisons de n objets pris k a k
   if k > n//2:
      k = n-k
   x = 1
   y = 1
   i = n-k+1
   while i <= n:
      x = (x*i)//y
      y += 1
      i += 1
   return x

def binom(k,n,p):
   #binom(k,n,p): probabilité d'avoir k réussite(s) dans n évènements indépendants, chaque évènement ayant une probabilité p% de réussite
   x=combin(n,k)*pow(p,k)*pow(1-p,n-k)
   return x


def main():
   
   #EXERCICE 2
   print("########## EXERCICE 2.1 ##########")
   
   print()

   bin1 = np.random.binomial(30,0.5,1000)
   bin2 = np.random.binomial(30,0.7,1000) 
   bin3 = np.random.binomial(50,0.4,1000) 
   plt.hist(bin2,bins=100,range=(1,100),label='n=30, p=0.7',density=True,histtype='bar')
   plt.hist(bin1,bins=100,range=(1,100),label='n=30, p=0.5',density=True,histtype='step')
   plt.hist(bin3,bins=100,range=(1,100),label='n=50, p=0.4',density=True,histtype='step')
   plt.xlabel('Valeur')
   plt.ylabel('Frequence') 
   plt.legend()
   plt.show()

   print("########## EXERCICE 2.2 ##########")

   x = np.linspace(-10, 10, 1000)
   plt.plot(x, norm.pdf(x, 0,1),label='$\mu=0, \sigma=1$')
   plt.plot(x, norm.pdf(x, 2,1.5),label='$\mu=2, \sigma=1.5$')
   plt.plot(x, norm.pdf(x, 2,0.6),label='$\mu=2, \sigma=0.6$')

   plt.xlabel('Valeur')
   plt.ylabel('Frequence')
   plt.legend()
   plt.show()

   print("########## EXERCICE 2.3.1 ##########")

   mu,sigma = 0,1
   x = np.linspace(-6,6,1000)
   s = np.random.normal(mu, sigma, 1000)
   count, bins, ignored = plt.hist(s, 100, density=True,label='Données Générées')
   plt.plot(bins, 1/(sigma * np.sqrt(2 * np.pi)) * np.exp( - (bins - mu)**2 / (2 * sigma**2) ),linewidth=2, color='r',label='Densité réelle')
   plt.xlabel('Valeur')
   plt.ylabel('Frequence')

   plt.legend()
   plt.show()

   print("########## EXERCICE 2.4.1 ##########")

   
   #1
   s1 = np.random.normal(0, 1, 20)
   print()
   muEmp1    = sum(s1)/20
   sigmaEmp1 = np.std(s1, dtype=np.float64)

   #1
   s2 = np.random.normal(0, 1, 80)
   print()
   muEmp2    = sum(s2)/80
   sigmaEmp2 = np.std(s2, dtype=np.float64)

   #3
   s3 = np.random.normal(0, 1, 150)
   print()
   muEmp3    = sum(s3)/150
   sigmaEmp3 = np.std(s3, dtype=np.float64)

   x = np.linspace(-5, 5, 1000)

   #AFFICHAGE
   mu,sigma = 0,1
   x = np.linspace(-5,5,1000)
   s = np.random.normal(mu, sigma, 1000)
   count, bins, ignored = plt.hist(s, 50, density=True,label='Valeurs générées')
   plt.plot(bins, 1/(sigma * np.sqrt(2 * np.pi)) * np.exp( - (bins - mu)**2 / (2 * sigma**2) ),linewidth=2, color='r')
   plt.plot(bins, 1/(sigmaEmp1 * np.sqrt(2 * np.pi)) * np.exp( - (bins - muEmp1)**2 / (2 * sigmaEmp1**2) ),"r--",linewidth=2, color='orange',label='$\mu=0, \sigma=1, n=20$')
   plt.plot(bins, 1/(sigmaEmp2 * np.sqrt(2 * np.pi)) * np.exp( - (bins - muEmp2)**2 / (2 * sigmaEmp2**2) ),"r--",linewidth=2, color='purple',label='$\mu=0, \sigma=1, n=80$')
   plt.plot(bins, 1/(sigmaEmp3 * np.sqrt(2 * np.pi)) * np.exp( - (bins - muEmp3)**2 / (2 * sigmaEmp3**2) ),"r--",linewidth=2, color='black',label='$\mu=0, \sigma=1, n=150$')
   plt.xlabel('Valeur')
   plt.ylabel('Frequence')

   plt.legend()
   plt.show()


   print("########## EXERCICE 2.4.2 ##########")

   lambdaBase = 1

   e1 = np.random.exponential(lambdaBase,20)
   MoyE1Emp = sum(e1)/20
   lambda1 = 1/MoyE1Emp
   e2 = np.random.exponential(lambdaBase,80)
   MoyE2Emp = sum(e2)/80
   lambda2 = 1/MoyE2Emp
   e3 = np.random.exponential(lambdaBase,150)
   MoyE3Emp = sum(e3)/150
   lambda3 = 1/MoyE3Emp

   #AFFICHAGE
  
   x = np.linspace(0,8,1000)
   s1 = np.random.exponential(lambdaBase, 1000)

   count, bins, ignored = plt.hist(s1, 50, density=True)
   plt.plot(bins,lambdaBase*np.exp(-lambdaBase*bins),linewidth=2, color='r',label='$\lambda=1.5$, Courbe théorique')
   plt.plot(bins,MoyE1Emp*np.exp(-(MoyE1Emp)*bins),"r--",linewidth=2, color='blue',label='$\lambda=1.5, n=20$')
   plt.plot(bins,MoyE2Emp*np.exp(-(MoyE2Emp)*bins),"r--",linewidth=2, color='black',label='$\lambda=1.5, n=80$')
   plt.plot(bins,MoyE3Emp*np.exp(-(MoyE3Emp)*bins),"r--",linewidth=2, color='green',label='$\lambda=1.5, n=150$')
   plt.xlabel('Valeur')
   plt.ylabel('Frequence')

   plt.legend()
   plt.show()

   




main()