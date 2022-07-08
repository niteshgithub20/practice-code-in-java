ArrayList<Integer> result=new ArrayList<>();

        int i=d;

        while(i<arr.size())

        {
            
result.add(arr.get(i));

            i++;

        }
  
      i=0;
 
       while(i<d)
   
     {
           
 result.add(arr.get(i));
 
           i++;
   
     }
  
      
        return result;