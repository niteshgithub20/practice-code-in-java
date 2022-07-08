import java.util.*;
import java.io.*;
import java.util.Scanner;
public class hello
 {

    public static void main(String[] args) 
    {
        Scanner sc = new Scanner(System.in);
        String str1 = sc.nextLine();
        String str2 = sc.nextLine();
        int count = 0;
        String arr[] = str1.split("");
        try 
        {
        if(str1 != null && !str1.isEmpty())
        {
            for(int i = 0; i < arr.length; i++)
            {
                String s1 = arr[i] + arr[i];
                int start  = (arr[i].length())- str2;
                System.out.println("arr[i]:" +arr[i]);
                String s2 = s1.substring(start,start + arr[i].length());
                System.out.println("s2:" +s2);
                if(s2.equalsIgnoreCase(arr[i]))
                {
                    count++;
                }
            }
        } 
        return count; 
        }   
       catch(Exception e)
       {
               System.out.println("Errors");
       } 
    }   
    
     }