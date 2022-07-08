import java.util.Scanner;
public class Matrix
{
public static void main(String[] args)
{
Scanner sc=new Scanner(System.in);
int len;
System.out.println("Enter the size of arrays");
len=sc.nextInt();
int a[]=new int[len];
System.out.println("Enetr "+len+"size of arrays elements");
for(int i=0;i<len;i++)
{
a[i]=sc.nextInt();
}
int b[]=new int[len];
System.out.println("Enter "+len+"size of arrays Elements");
for(int i=0;i<len;i++)
{
b[i]=sc.nextInt();
}
int c[]=new int[len];
for(int i=0;i<len;i++)
{
c[i]=a[i]+b[i];
System.out.println("The sum of two matrix are :"+c[i]);
}
sc.nextLine();
System.out.println("The sum of two matrix are :"+c[int i]);
}
}
