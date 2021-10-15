#include <stdio.h>
#include <stdlib.h>

#define TAILLETAB 10

int prisePionJ1(char damier[][TAILLETAB], int nbrPionJ1);
int priseDameJ1(char damier[][TAILLETAB], int nbrPionJ1);
void pionDeplacementValideJ1(char damier[][TAILLETAB], int ligneD, int colonneD);
void dameDeplacementValideJ1(char damier[][TAILLETAB], int LigneD, int ColonneD);