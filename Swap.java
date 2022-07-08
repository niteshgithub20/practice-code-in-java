import java.util.Scanner;
public class Swap
{
public static void main(String[] args)
{
int first,second,num;
System.out.println("Enter two number for swap :");
Scanner sc=new Scanner(System.in);
first=sc.nextInt();
second=sc.nextInt();
num=first;
first=second;
second=num;
System.out.println("The swap numeber is :"+first);
System.out.println("The swap second number is :"+second);
}
}