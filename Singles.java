import java.util.*;
import java.util.Scanner;
class Singles
{
    public static void main(String[] args)
    {
        Scanner sc = new Scanner(System.in);
        int length = sc.nextInt();
        int[] arr = new int[length];
        for(int i = 0; i<length;i++)
        {
            arr[i] = sc.nextInt();
        }
        int[] res = arr[0];
         for (int i = 1; i < length; i++)
         {
           res = res ^ arr[i]; 
         } 
            
      
        System.out.println(res);  

    }
}