import java.util.Scanner;
public class Bignum
{
public static void main(String[] args)
{
double num1,num2,num3;
System.out.println("Enter three numbers to find biggest :");
Scanner sc=new Scanner(System.in);
num1=sc.nextDouble();
num2=sc.nextDouble();
num3=sc.nextDouble();
if(num1 >= num2 && num1 >= num3)
System.out.println("The biggest number is :"+num1);
else if(num2 >= num1 && num2 >= num3)
System.out.println("The biggest number is :"+num2);
else
System.out.println("The biggest number is :"+num3);
}
}