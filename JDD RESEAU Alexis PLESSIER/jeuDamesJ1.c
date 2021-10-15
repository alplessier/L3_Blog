#include <stdio.h>
#include <stdlib.h>

#define TAILLETAB 10

#include "affichage.h"




int prisePionJ1(char damier[][TAILLETAB], int nbrPionJ1)
{

   char choix;

   for(int i = 0; i < TAILLETAB; i++)
   {
      for(int j = 0; j < TAILLETAB; j++)
      {
         //PRISE DIAG DROITE BAS
         if(((j>=0 || j<8 ) && (i>=0 || i<8) && (damier[i+1][j+1] == 'o' || damier[i+1][j+1] == 'O') && damier[i][j]== 'x' && damier[i+2][j+2] == ' ' ))
         {
            printf("\n Voulez vous prendre le pion en [%d][%d] avec le pion en [%d][%d] ? (o/n) : ",i+1,j+1,i,j);
            scanf("%c",&choix);
            if(choix == 'o')
            {
               damier[i][j] = ' ';
               damier[i+1][j+1] = ' ';
               damier[i+2][j+2] = 'x';
               nbrPionJ1--;
               return 1;
            }
            
            
         }
         //PRISE DIAG GAUCHE BAS
         if(((j>1 || j<10 ) && (i>=0 || i<8) && (damier[i+1][j-1] == 'o' || damier[i+1][j-1] == 'O') && damier[i][j]== 'x' && damier[i+2][j-2] == ' '))
         {
            printf("\n Voulez vous prendre le pion en [%d][%d] avec le pion en [%d][%d] ? (o/n) : ",i+1,j-1,i,j);
            scanf("%c",&choix);
            if(choix == 'o')
            {
               damier[i][j] = ' ';
               damier[i+1][j-1] = ' ';
               damier[i+2][j-2] = 'x';
               nbrPionJ1--;
               return 1;
            }
            
         }
         //PRISE DIAG DROITE HAUT
         if(((j>=0 || j<8) && (i>1 || i<10) && (damier[i-1][j+1] == 'o' || damier[i-1][j+1] == 'O') && damier[i][j] == 'x' && damier[i-2][j+2] == ' '))
         {
            printf("\n Voulez vous prendre le pion en [%d][%d] avec le pion en [%d][%d] ? (o/n) : ",i-1,j+1,i,j);
            scanf("%c",&choix);
            if(choix == 'o')
            {
               damier[i][j] = ' ';
               damier[i-1][j+1] = ' ';
               damier[i-2][j+2] = 'x';
               nbrPionJ1--;
               return 1;
            }

         }
         //PRISE DIAG GAUCHE HAUT 
         if(((j>1 || j<10) && (i>1 || i<10) && (damier[i-1][j-1] == 'o' || damier[i-1][j-1] == 'O') && damier[i][j] == 'x' && damier[i-2][j-2] == ' '))
         {
            printf("\n Voulez vous prendre le pion en [%d][%d] avec le pion en [%d][%d] ? (o/n) : ",i-1,j-1,i,j);
            scanf("%c",&choix);
            if(choix == 'o')
            {
               damier[i][j] = ' ';
               damier[i-1][j-1] = ' ';
               damier[i-2][j-2] = 'x';
               nbrPionJ1--;
               return 1;
            }
         }
      }
   }
   
   return 0;

}

int priseDameJ1(char damier[][TAILLETAB], int nbrPionJ1)
{
   char choix;
   for(int i = 0; i < TAILLETAB;i++)
   {
      for(int j = 0; j < TAILLETAB; j++)
      {
         //Prise Dames Diag Haut gauche 

         if(damier[i][j] == 'X')
         {
            while (j > 0)
            {
               j -=1;
               i -=1;
               if(((damier[i][j] == 'o' || damier[i][j] == 'O') && damier[i-1][j-1] == ' ')) //
               {
                  printf("\nLa dame peut prendre le pion en [%d][%d]. Voulez vous le prendre ? (o/n) :",i,j);
                  scanf("%c",&choix);

                  if(choix == 'o')
                  {
                     damier[i][j] = ' ';
                     damier[i-1][j-1] = 'X';
                     nbrPionJ1--;
                     return 1;
                  }
               }
            }

            // Prise dames diag haut droite
            i = 0;
            j = 0;

            while (j < 9)
            {
               j +=1;
               i +=1;
               if(((damier[i][j] == 'o' || damier[i][j] == 'O') && damier[i+1][j+1] == ' ')) //
               {
                  printf("\nLa dame peut prendre le pion en [%d][%d]. Voulez vous le prendre ? (o/n) :",i,j);
                  scanf("%c",&choix);

                  if(choix == 'o')
                  {
                     damier[i][j] = ' ';
                     damier[i+1][j+1] = 'X';
                     nbrPionJ1--;
                     return 1;
                  }
               }
            }

            // Prise dames diag bas gauche
            i = 0;
            j = 0;

            while (j > 0)
            {
               j -=1;
               i +=1;
               if(((damier[i][j] == 'o' || damier[i][j] == 'O') && damier[i+1][j-1] == ' ')) //
               {
                  printf("\nLa dame peut prendre le pion en [%d][%d]. Voulez vous le prendre ? (o/n) :",i,j);
                  scanf("%c",&choix);

                  if(choix == 'o')
                  {
                     damier[i][j] = ' ';
                     damier[i+1][j-1] = 'X';
                     nbrPionJ1--;
                     return 1;
                  }
               }
            }

             // Prise dames diag bas gauche
            i = 0;
            j = 0;

            while (j < 9)
            {
               j +=1;
               i -=1;
               if(((damier[i][j] == 'o' || damier[i][j] == 'O') && damier[i-1][j+1] == ' ')) //
               {
                  printf("\nLa dame peut prendre le pion en [%d][%d]. Voulez vous le prendre ? (o/n) :",i,j);
                  scanf("%c",&choix);

                  if(choix == 'o')
                  {
                     damier[i][j] = ' ';
                     damier[i-1][j+1] = 'X';
                     nbrPionJ1--;
                     return 1;
                  }
               }
            }  
         }
      }
   }

   return 0;
}

void pionDeplacementValideJ1(char damier[][TAILLETAB],int ligneD, int colonneD)
{
   
   int choixLigne = -1;
   int choixColonne = -1;


   if(colonneD == 0 && damier[ligneD+1][colonneD+1] == ' ')
   {
      damier[ligneD][colonneD] = ' ';
      printf("Choix possible : [%d][%d]\n",ligneD+1,colonneD+1);
      damier[ligneD+1][colonneD+1] = 'x';
   }

   else if(colonneD == 9 && damier[ligneD-1][colonneD-1] == ' ')
   {
      damier[ligneD][colonneD] = ' ';
      printf("Choix possible : [%d][%d]\n",ligneD-1,colonneD-1);
      damier[ligneD-1][colonneD-1] = 'x';
   }

   else
   {
      damier[ligneD][colonneD] = ' ';
      printf("Choix possible : [%d][%d] et [%d][%d]  \n",ligneD+1,colonneD-1, ligneD+1, colonneD+1);
      
      do{
         printf("\nChoix Ligne d'arrivee : ");
         scanf("%d",&choixLigne);
         printf("Choix Colonne d'arrivee : ");
         scanf("%d",&choixColonne);
      }while((choixLigne != ligneD+1 || choixColonne != colonneD-1) && (choixLigne != ligneD+1 || choixColonne != colonneD+1) 
      || (damier[ligneD+1][colonneD-1] != ' ' && damier[ligneD+1][colonneD+1] != ' '));

      if(choixLigne == 9)
      {
         damier[choixLigne][choixColonne] = 'X'; //Devient Dame
      }

      else 
         damier[choixLigne][choixColonne] = 'x';

   }

   afficheDamier(damier);
}

void dameDeplacementValideJ1(char damier[][TAILLETAB], int LigneD, int ColonneD)
{
   int choixLigne = -1;
   int choixColonne = -1;
   
   invalide:
      do{
         printf("\nChoix Ligne d'arrivee : ");
         scanf("%d",&choixLigne);
         printf("Choix Colonne d'arrivee : ");
         scanf("%d",&choixColonne);
      }while((choixColonne > 9 || choixColonne < 0) && (choixLigne > 9 || choixLigne < 0));

      //Deplacement dame haut gauche
      if(choixColonne<ColonneD && choixLigne<LigneD)
      {
         for(int i = LigneD-1; i != choixLigne; i--)
         {
            for(int j = ColonneD-1; j != choixColonne; j--)
            {
               if(damier[i][j] != ' ')
                  printf("\n Deplacement Impossible !");
                  goto invalide;
            }
         }
         damier[LigneD][ColonneD] = ' ';
         damier[choixLigne][choixColonne] = 'X';
      }

      //Deplacement dame haut droite
      if(choixColonne>ColonneD && choixLigne<LigneD)
      {
         for(int i = LigneD-1; i != choixLigne; i--)
         {
            for(int j = ColonneD+1; j != choixColonne; j++)
            {
               if(damier[i][j] != ' ')
                  printf("\n Deplacement Impossible !");
                  goto invalide;
            }
         }
         damier[LigneD][ColonneD] = ' ';
         damier[choixLigne][choixColonne] = 'X';
      }

      //Deplacement dame bas gauche
      if(choixColonne<ColonneD && choixLigne>LigneD)
      {
         for(int i = LigneD+1; i != choixLigne; i++)
         {
            for(int j = ColonneD-1; j != choixColonne; j--)
            {
               if(damier[i][j] != ' ')
                  printf("\n Deplacement Impossible !");
                  goto invalide;
            }
         }
         damier[LigneD][ColonneD] = ' ';
         damier[choixLigne][choixColonne] = 'X';
      }
      
      //Deplacement dame bas droit
      if(choixColonne>ColonneD && choixLigne>LigneD)
      {
         for(int i = LigneD+1; i != choixLigne; i++)
         {
            for(int j = ColonneD+1; j != choixColonne; j++)
            {
               if(damier[i][j] != ' ')
                  printf("\n Deplacement Impossible !");
                  goto invalide;
            }
         }
         damier[LigneD][ColonneD] = ' ';
         damier[choixLigne][choixColonne] = 'X';
      }


   afficheDamier(damier);
}



