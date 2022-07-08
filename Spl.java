import java.util.Scanner;
public class Spl
{
public static void main(String... args)
{
int n,temp,j;
System.out.println("Enter the arrays size");
Scanner sc=new Scanner(System.in);
n=sc.nextInt();
int arr[]=new int[n];
System.out.println("Enter the elements for sorting");
for(int i=0;i<n;i++)
{
arr[i]=sc.nextInt();
}
for(int i=0;i<n;i++)
{
for(j=i+1;j<n;j++)
{
if(arr[i]>arr[j])
{
temp=arr[i];
arr[i]=arr[j];
arr[j]=temp;
}
}
}
System.out.println("Sorting Elements");
for(int i=0;i<n-1;i++)
{
System.out.println(+arr[i]);
}
System.out.println(arr[n-1]);
}
}