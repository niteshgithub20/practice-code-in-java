import java.util.*;
import java.util.Scanner;
public class Facts
{
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter the first number");
        int num1 = sc.nextInt();
        System.out.println("Enter the Scond number");
        int num2 = sc.nextInt();

        for(int n=num1;n<=num2;n++)//   
        {
            int sum=0,prod=1,b,num,digit;
            b = num = n;
            while(b!=0)
            {
                digit = b%10;
                b = b/10;
                for(int i = 1;i<=digit;i++)
                {
                    prod = prod*i;
                    sum = sum + prod;
                }
            }
        if(num == sum)
        {
            System.out.println("The Strong number between and "+num);
        }    
        }

    }
}