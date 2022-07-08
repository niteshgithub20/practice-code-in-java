import java.util.Scanner;
public class Factorial
{
    public static void main(String args[]) throws Exception
    {
        long n,fact=1;
        System.out.println("Enetr the integer number");
        Scanner sc=new Scanner(System.in);
        n=sc.nextLong();
        for(long i=1;i<=n;i++)
        {
            fact=fact*i;
        }
        System.out.println(fact);
    }
}