import java.util.*;
import java.util.Scanner;
class Single
{  
    public static int SingleValue(int ar[], int size) 
    { 
    
        int res = ar[0]; 
        for (int i = 1; i < size; i++) 
            res = res ^ ar[i]; 
      
        return res; 
    } 
  
    public static void main (String[] args) 
    {   
        Scanner sc = new Scanner(System.in);
        int n = sc.nextInt();  
        int[] ar = new int[n];  
        for(int i=0; i<n; i++) 
        {  
         ar[i] = sc.nextInt();  
        }   
        System.out.println(SingleValue(ar, n)); 
    } 
} 