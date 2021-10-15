#include <stdio.h>
#include <stdlib.h>

#include "affichage.h"
#include "jeu.h"

#define TAILLETAB 10
#define NBRPIONJ1 20
#define NBRPIONJ2 20

char damier[TAILLETAB][TAILLETAB];

int main(void){

   int choixMenu    = 0;
   int choixLigne   = -1;
   int choixColonne = -1;

   menu();

   while(choixMenu<1 || choixMenu>4)
   {
      printf("Quel choix voulez-vous faire ? : ");
      scanf("%d",&choixMenu);
      printf("\n");
   }

   //INIT ET AFFICHE 
   initDamier(damier);
   afficheDamier(damier);

   switch (choixMenu)
   {
      case 1:
         while (NBRPIONJ1 > 0 || NBRPIONJ2 > 0)
         {
         //JEU J1
         while(prisePionJ1(damier,NBRPIONJ1));
         while(priseDameJ1(damier,NBRPIONJ1));
         
         errdeplacement:
         do{
            printf("\n================ JOUEUR 1 ================\n");
            printf("Ligne du pion a deplacer : ");
            scanf("%d",&choixLigne);
            printf("Colonne du pion a deplacer : ");
            scanf("%d",&choixColonne);
         }while((damier[choixLigne][choixColonne] != 'x' && damier[choixLigne][choixColonne] != 'X') 
         || (choixLigne < 0 || choixLigne > 9) || (choixColonne < 0 || choixColonne > 9));


         if(damier[choixLigne+1][choixColonne-1] == ' ' && damier[choixLigne+1][choixColonne+1 == ' '])
         {
            pionDeplacementValideJ1(damier,choixLigne,choixColonne);
         }

         else if(damier[choixLigne][choixColonne] == 'X')
         {
            dameDeplacementValideJ1(damier,choixLigne,choixColonne);
         }

         else
         {
            printf("Le pion ne peut etre deplace !\n");
            goto errdeplacement;
         } 
         

         printf("\n PASSE ICI\n");
      }
      
      break;

   case 2:
      printf("\n oui oui oui");
      
      break;
   
   case 3:
      
      break;

   case 4:
      
      break;
   
   default:
      break;
   }

   return 0;
}