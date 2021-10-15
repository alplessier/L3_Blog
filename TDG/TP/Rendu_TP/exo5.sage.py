def fun(n):
    
   k       = -1

   l       = []
   clause  = []
   attr1   = []
   attr2   = []

   for j in range(n):
      while True:
         a = int(input("Valeur de x{} (0 ou 1): ".format(j+1)))
         if a>= 0 and a < 2:
            break

      print()
      if(a == 0):
         l.insert(j,a)
         l.insert(j+n,a+1)
      else :
         l.insert(j,a)
         l.insert(j+n,a-1)

   nbClause = int(input("Combien y a t-il de Clauses ? : "))
   s = ""
   g = DiGraph()

   print()
   for i in range(nbClause):
      print("() ", end='')
   
   print()
   print()
   print("La selection se fait comme suit : de 1 à {} = de x1 à x{} - de {} à {} = de _x1 à _x{}".format(n,n,n+1,2*n,n))
   print()   

   for i in range(nbClause):
      

      choix1 = int(input("Choix 1 : "))
      choix2 = int(input("Choix 2 : "))
      print()

      if(choix1<=n and choix2<=n and choix1):
         s = s + "(x{} OU x{}) ET ".format(choix1,choix2)
         g.add_edge(choix1-1+n,choix2-1)                                      # Ajoute les arretes au graphe.
         g.add_edge(choix2-1+n,choix1-1)                                      # Ajoute les arretes au graphe.

      
      elif(choix1<=n and choix2>n and choix1+n != choix2 ):
         s = s + "(x{} OU _x{}) ET ".format(choix1,choix2-n)
         g.add_edge(choix1-1+n,choix2-1)                                      # Ajoute les arretes au graphe.
         g.add_edge(choix2-1-n,choix1-1)                                      # Ajoute les arretes au graphe.


      elif(choix1>n and choix2>n):
         s = s + "(_x{} OU _x{}) ET ".format(choix1-n,choix2-n)
         g.add_edge(choix1-1-n,choix2-1)                                      # Ajoute les arretes au graphe.
         g.add_edge(choix2-1-n,choix1-1)                                      # Ajoute les arretes au graphe.


      elif(choix1>n and choix2<=n and choix2+n != choix1):
         s = s + "(_x{} OU x{}) ET ".format(choix1-n,choix2)
         g.add_edge(choix1-1-n,choix2-1)                                      # Ajoute les arretes au graphe.
         g.add_edge(choix2-1+n,choix1-1)                                      # Ajoute les arretes au graphe.


      clause.insert(i,l[choix1-1] or l[choix2-1])
      attr1.insert(i,l[choix1-1])
      attr2.insert(i,l[choix2-1])
   
      

      print(s[0:len(s)-4])

   for i in range(1,len(clause)):
      clause[0] = clause[0] and clause[i]

   print()
   print("Resultat de la formule = {}".format(bool(clause[0])))
   print()
   print("============ CFC ============")
    
   li   = []
   var  = 0
   flag = 0
    
   for i in range(2*n):
        li = sage.graphs.connectivity.strongly_connected_component_containing_vertex(g, i)
        print("SOMMET {} : {}".format(i,li))
        
        for j in range(len(li)):
            if li[j] == i+n:
                var = var+1
                
        if(var != 0 and i>=n):
            print("NON SATISFAISABLE : les sommets {} et {} ne sont pas dans la meme CFC !".format(i,i-n))
            flag += 1

        elif(var != 0 and i<n):
            print("NON SATISFAISABLE : les sommets {} et {} ne sont pas dans la meme CFC !".format(i,i+n))
            flag += 1

                
        while len(li) > 0 : li.pop()
        var = 0
    

   

   if(clause[0] == 0):
        while(clause[0] == 0):
            for i in range(n):
                l[i] = randint(0,1)
                if(l[i] == 0):
                    l[i+n] = 1
                else: l[i+n] = 0
            
            
            for j in range(nbClause):
                clause[j] = (l[attr1[j]] or l[attr2[j]])
                
                    
            print()
            for k in range(1,len(clause)):
                clause[0] = clause[0] and clause[i]
                
        
        print("============ AFFECTATION ============")            
        print("Formule vraie pour : ")
        for i in range(n):
            print("Valeur de x{} : {}  |   _x{} : {} ".format(i+1,l[i],i+1,l[i+n]))
                
                
   
             
       
   g.show()
         
      
      

saise = int(input("Combien de variables avez vous ? : "))
fun(saise)
