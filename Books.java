import java.util.Scanner;
import java.util.*;
public class Books
{
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        int num = sc.nextInt();
        if(num >= 30 && num <= 100)
        {
            if(num >= 30 && num <= 50)
          System.out.println("D");
            else if(num >= 51 && num <= 60)
          System.out.println("C");
            else if(num >= 61 && num <= 80)
          System.out.println("B");
          else
          System.out.println("A");
        }
        else
        {
            System.out.println("Invalid record");
        }
    }
}