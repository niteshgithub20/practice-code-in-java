import java.util.*;
import java.util.Scanner;
class Strings
{
    public static void main(String[] args)
    {
        Scanner sc = new Scanner(System.in);
        String str = sc.nextLine();
        int n = str.length();
        int num = Integer.parseInt(str);
        if(num > 0)
        {
            System.out.println("full");

        }
        else
        {
            System.out.println("half");
        }
        
         
    }
}